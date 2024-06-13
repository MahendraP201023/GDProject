<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/
include_once dirname(__FILE__) . '/models/Alert.php';
include_once dirname(__FILE__) . '/models/SearchFilter.php';
include_once dirname(__FILE__) . '/models/Paging.php';

class Mobile_WS_ListModuleRecords extends Mobile_WS_Controller {

	function isCalendarModule($module) {
		return ($module == 'Events' || $module == 'Calendar');
	}
	
	function getSearchFilterModel($module, $search) {
		return Mobile_WS_SearchFilterModel::modelWithCriterias($module, Zend_JSON::decode($search));
	}
	
	function getPagingModel(Mobile_API_Request $request) {
		$page = $request->get('page', 0);
		return Mobile_WS_PagingModel::modelWithPageStart($page);
	}

	function process(Mobile_API_Request $request) {
		global $adb;
		$current_user = $this->getActiveUser();
		$module = $request->get('module');
		$filterId = $request->get('filterid');
		$page = $request->get('page','1');
		$orderBy = $request->getForSql('orderBy');
		$sortOrder = $request->getForSql('sortOrder');
		
		$moduleModel = Vtiger_Module_Model::getInstance($module);
		$headerFieldModels = $moduleModel->getHeaderViewFieldsList();
		
		$headerFields = array();
		$fields = array();
		$headerFieldColsMap = array();

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

		if ($module == 'HelpDesk') $headerFieldColsMap['title'] = 'ticket_title';
		if ($module == 'Documents') $headerFieldColsMap['title'] = 'notes_title';

		$listViewModel = Vtiger_ListView_Model::getInstance($module, $filterId, $headerFields);
		
		if(!empty($sortOrder)) {
			$listViewModel->set('orderby', $orderBy);
			$listViewModel->set('sortorder',$sortOrder);
		}
		
		if (!empty($request->get('search_key'))) {
			$listViewModel->set('search_key', $request->get('search_key'));
			$listViewModel->set('search_value', $request->get('search_value'));
			$listViewModel->set('operator', $request->get('operator'));
		}

		$response = new Mobile_API_Response();
		if (!empty($request->get('search_params'))) {
			$searchParams = json_decode($request->get('search_params'));
			if (empty($searchParams)) {
				$searchParams = [];
			}
			if(empty($searchParams) && !empty($request->get('search_params'))){
				$response->setError(100, "Invalid search_params Format ");
            	return $response;
			}
			$searchParams = array($searchParams);
			$transformedSearchParams = $this->transferListSearchParamsToFilterCondition($searchParams, $listViewModel->getModule());
			$listViewModel->set('search_params', $transformedSearchParams);
		}

		$listViewModel->set('searchAllFieldsValue', $request->get('searchAllFieldsValue'));
		
		$pagingModel = new Vtiger_Paging_Model();
		$pageLimit = $pagingModel->getPageLimit();
		$pagingModel->set('page', $page);
		$pagingModel->set('limit', $pageLimit+1);
		
		$listViewEntries = $listViewModel->getListViewEntries($pagingModel);
		
		if(empty($filterId)) {
			$customView = new CustomView($module);
			$filterId = $customView->getViewId($module);
		}
		
		if($listViewEntries) {
			foreach($listViewEntries as $index => $listViewEntryModel) {
				$data = $listViewEntryModel->getRawData();
				$record = array('id'=>vtws_getWebserviceEntityId($module, $listViewEntryModel->getId()));
				foreach($data as $i => $value) {
					if(is_string($i)) {
						// Transform header-field (column to fieldname) in response.
						if (isset($headerFieldColsMap[$i])) {
							$i = $headerFieldColsMap[$i];
						}	
						$record[$i]= decode_html($value); 
						unset($record['accountid']);
						unset($record['contactid']);
						//unset($record['lastname']);
						unset($record['visibility']);
					}
				}

				$recordWithLabel = array();
				foreach ($record as $key => $value) {
				    
				    if($module == 'ProjectTask'){
					    if($key == 'projectid'){
					        $getProjectName = $adb->pquery("SELECT * FROM vtiger_project INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_project.projectid WHERE vtiger_crmentity.deleted = 0 AND vtiger_project.projectid = ?", array($value));
					        $value = $adb->query_result($getProjectName, 0, 'projectname');
					    }
					}
					
					if($module == 'ExtraWork'){
					    if($key == 'extrawork_project'){
					        $getProjectName = $adb->pquery("SELECT * FROM vtiger_project INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_project.projectid WHERE vtiger_crmentity.deleted = 0 AND vtiger_project.projectid = ?", array($value));
					        $value = $adb->query_result($getProjectName, 0, 'projectname');
					    }
					}
					
					if($module == 'MeetingNotes'){
					    if($key == 'project_name'){
					        $getProjectName = $adb->pquery("SELECT * FROM vtiger_project INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_project.projectid WHERE vtiger_crmentity.deleted = 0 AND vtiger_project.projectid = ?", array($value));
					        $value = $adb->query_result($getProjectName, 0, 'projectname');
					    }
					}
					
					if($module == 'Measurement'){
					    if($key == 'measurement_project'){
					        $getProjectName = $adb->pquery("SELECT * FROM vtiger_project INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_project.projectid WHERE vtiger_crmentity.deleted = 0 AND vtiger_project.projectid = ?", array($value));
					        $value = $adb->query_result($getProjectName, 0, 'projectname');
					    }
					}
					
					if($key == 'assigned_user_id'){
						$userId = explode('x', $value);
						$getUserName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($value));
						$userRows = $adb->num_rows($getUserName);
						if($userRows){
						    $userName = $adb->query_result($getUserName, 0, 'first_name').' '.$adb->query_result($getUserName, 0, 'last_name');
						    $value = $userName;
						}else{
						    $getgroupName = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($value));
						    $userName = $adb->query_result($getgroupName, 0, 'groupname');
						    $value = $userName;
						}
						
					}

					$fieldLabelQuery = $adb->pquery("SELECT * FROM vtiger_field WHERE fieldname = ? AND tabid = ?", array($key, getTabid($module)));
					$fieldLabel = $adb->query_result($fieldLabelQuery, 0, 'fieldlabel');
					if($fieldLabel){
						$recordWithLabel[vtranslate($fieldLabel, $module)] = vtranslate($value, $module);
					}else{
						$recordWithLabel[$key] = vtranslate($value, $module);
					}
					
				}

				$records[] = $recordWithLabel;
			}
		}
		
		$moreRecords = false;
		if(php7_count($listViewEntries) > $pageLimit) {
			$moreRecords = true;
			array_pop($records);
		}

		$response = new Mobile_API_Response();
		$response->setResult(array(	'records'=>$records, 
									'headers'=>$fields, 
									'selectedFilter'=>$filterId, 
									'nameFields'=>$nameFields,
									'moreRecords'=>$moreRecords,
									'orderBy'=>$orderBy,
									'sortOrder'=>$sortOrder,
									'page'=>$page));
		
		$response->setApiSucessMessage('Successfully Fetched Data');
		return $response;
	}

	function processSearchRecordLabelForCalendar(Mobile_API_Request $request, $pagingModel = false) {
		$current_user = $this->getActiveUser();
		
		// Fetch both Calendar (Todo) and Event information
		$moreMetaFields = array('date_start', 'time_start', 'activitytype', 'location');
		$eventsRecords = $this->fetchRecordLabelsForModule('Events', $current_user, $moreMetaFields, false, $pagingModel);
		$calendarRecords=$this->fetchRecordLabelsForModule('Calendar', $current_user, $moreMetaFields, false, $pagingModel);

		// Merge the Calendar & Events information
		$records = array_merge($eventsRecords, $calendarRecords);
		
		$modifiedRecords = array();
		foreach($records as $record) {
			$modifiedRecord = array();
			$modifiedRecord['id'] = $record['id'];                      unset($record['id']);
			$modifiedRecord['eventstartdate'] = $record['date_start'];  unset($record['date_start']);
			$modifiedRecord['eventstarttime'] = $record['time_start'];  unset($record['time_start']);
			$modifiedRecord['eventtype'] = $record['activitytype'];     unset($record['activitytype']);
			$modifiedRecord['eventlocation'] = $record['location'];     unset($record['location']);
			
			$modifiedRecord['label'] = implode(' ',array_values($record));
			
			$modifiedRecords[] = $modifiedRecord;
		}
		
		$response = new Mobile_API_Response();
		$response->setResult(array('records' =>$modifiedRecords, 'module'=>'Calendar'));
		
		return $response;
	}
	
	function fetchRecordLabelsForModule($module, $user, $morefields=array(), $filterOrAlertInstance=false, $pagingModel = false) {
		if($this->isCalendarModule($module)) {
			$fieldnames = Mobile_WS_Utils::getEntityFieldnames('Calendar');
		} else {
			$fieldnames = Mobile_WS_Utils::getEntityFieldnames($module);
		}
		
		if(!empty($morefields)) {
			foreach($morefields as $fieldname) $fieldnames[] = $fieldname;
		}

		if($filterOrAlertInstance === false) {
			$filterOrAlertInstance = Mobile_WS_SearchFilterModel::modelWithCriterias($module);
			$filterOrAlertInstance->setUser($user);
		}
			
		return $this->queryToSelectFilteredRecords($module, $fieldnames, $filterOrAlertInstance, $pagingModel);
	}
	
	function queryToSelectFilteredRecords($module, $fieldnames, $filterOrAlertInstance, $pagingModel) {
		
		if ($filterOrAlertInstance instanceof Mobile_WS_SearchFilterModel) {
			return $filterOrAlertInstance->execute($fieldnames, $pagingModel);
		}
		
		global $adb;
		
		$moduleWSId = Mobile_WS_Utils::getEntityModuleWSId($module);
		$columnByFieldNames = Mobile_WS_Utils::getModuleColumnTableByFieldNames($module, $fieldnames);

		// Build select clause similar to Webservice query
		$selectColumnClause = "CONCAT('{$moduleWSId}','x',vtiger_crmentity.crmid) as id,";
		foreach($columnByFieldNames as $fieldname=>$fieldinfo) {
			$selectColumnClause .= sprintf("%s.%s as %s,", $fieldinfo['table'],$fieldinfo['column'],$fieldname);
		}
		$selectColumnClause = rtrim($selectColumnClause, ',');
		
		$query = $filterOrAlertInstance->query();
		$query = preg_replace("/SELECT.*FROM(.*)/i", "SELECT $selectColumnClause FROM $1", $query);
		
		if ($pagingModel !== false) {
			$query .= sprintf(" LIMIT %s, %s", $pagingModel->currentCount(), $pagingModel->limit());
		}

		$prequeryResult = $adb->pquery($query, $filterOrAlertInstance->queryParameters());
		return new SqlResultIterator($adb, $prequeryResult);
	}
	
}
