<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once dirname(__FILE__) . '/FetchRecordWithGrouping.php';

include_once 'include/Webservices/Query.php';

class Mobile_WS_Query extends Mobile_WS_FetchRecordWithGrouping {
	
	function processQueryResultRecord(&$record, $user) {
		$this->resolveRecordValues($record, $user);
		return $record;
	}
	
	function process(Mobile_API_Request $request) {
	    $recordid = explode('x', $_REQUEST['record']);
	    $filterId = $request->get('filterid');
	    global $adb;
	    $getModuleQuery = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($recordid[1]));
	    $module = $adb->query_result($getModuleQuery, 0, 'setype');
	    
	    $moduleModel = Vtiger_Module_Model::getInstance($_REQUEST['relatedmodule']);
		$headerFieldModels = $moduleModel->getHeaderViewFieldsList();
	    
	    $headerFields = array();
		$fields = array();
		$headerFieldColsMap = array();
        
        if(empty($filterId)) {
			$customView = new CustomView($module);
			$filterId = $customView->getViewId($module);
		}
		
		$nameFields = $moduleModel->getNameFields();
		if(is_string($nameFields)) {
			$nameFieldModel = $moduleModel->getField($nameFields);
			$headerFields[] = $nameFields;
			$fields = array('name'=>$nameFieldModel->get('name'), 'label'=>$nameFieldModel->get('label'), 'fieldType'=>$nameFieldModel->getFieldDataType());
		} else if(is_array($nameFields)) {
			foreach($nameFields as $nameField) {
				$nameFieldModel = $moduleModel->getField($nameField);
				$headerFields[] = $nameField;
				$fields[] = array('name'=>$nameFieldModel->get('name'), 'label'=>$nameFieldModel->get('label'), 'fieldType'=>$nameFieldModel->getFieldDataType());
			}
		}
		
		foreach($headerFieldModels as $fieldName => $fieldModel) {
			$headerFields[] = $fieldName;
			$fields[] = array('name'=>$fieldName, 'label'=>$fieldModel->get('label'), 'fieldType'=>$fieldModel->getFieldDataType());
			$headerFieldColsMap[$fieldModel->get('column')] = $fieldName;
		}
	    
	    
		$current_user = $this->getActiveUser();
		
		$query = $request->get('query', '', false);
		$nextPage = 0;
		$page = 1;
		$orderBy = $request->getForSql('orderBy');
		$sortOrder = $request->getForSql('sortOrder');
		$queryResult = false;
		
		if (preg_match("/(.*) LIMIT[^;]+;/i", $query)) {
			$queryResult = vtws_query($query, $current_user);
		} else {
			// Implicit limit and paging
			$query = rtrim($query, ";");

			$currentPage = intval($request->get('page', 0));
			$FETCH_LIMIT = '99'; 
			$startLimit = $currentPage * $FETCH_LIMIT;
			
			$queryWithLimit = sprintf("%s LIMIT %u,%u;", $query, $startLimit, ($FETCH_LIMIT+1));
			$queryResult = vtws_query($queryWithLimit, $current_user);
			
			// Determine paging
			$hasNextPage = (php7_count($queryResult) > $FETCH_LIMIT);
			$moreRecords = false;
			if ($hasNextPage) {
			    $moreRecords = true;
				array_pop($queryResult); // Avoid sending next page record now
				$nextPage = $currentPage + 1;
			}
		}

		$records = array();
		if (!empty($queryResult)) {
			foreach($queryResult as $recordValues) {
				$records[] = $this->processQueryResultRecord($recordValues, $current_user);
			}
		}
		
		$listviewRecord = array();
		foreach($records as $key => $value){
		    foreach($value['blocks'] as $blockskey => $blocksvalue){
		        foreach($blocksvalue['fields'] as $fieldskey => $fieldsvalue){
		            if(is_array($fieldsvalue['value'])){
		                foreach($fieldsvalue['value'] as $key1 => $value1){
	                        $listviewRecord[$key][$fieldsvalue['label']] = $value1;
		                }
		            }else{
		                $listviewRecord[$key][$fieldsvalue['label']] = $fieldsvalue['value'];
		            }
		        }
		    }
		}
		
		$result = array('records' => $listviewRecord, 'moreRecords'=>$moreRecords, 'orderBy'=>$orderBy, 'sortOrder'=>$sortOrder, 'page'=>$page, 'headers'=>$fields, 'nameFields'=>$nameFields,'selectedFilter'=>$filterId);
		
		$response = new Mobile_API_Response();
		$response->setResult($result);
		$response->setApiSucessMessage('Successfully Fetched Data');
		return $response;
	}
}