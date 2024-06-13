<?php
class Mobile_WS_RelatedModuleCounts extends Mobile_WS_Controller {
    var $relationModules = array();
    function process(Mobile_API_Request $request) {
        global $adb;
        $response = new Mobile_API_Response();
        $record = explode('x', $request->get('record'));
        $module = $request->get('module');
        
        $parentRecordId = $record[1];
		$parentModule = $request->get("module");
		$parentModuleModel = Vtiger_Module_Model::getInstance($parentModule);
		$parentRecordModel = Vtiger_Record_Model::getInstanceById($parentRecordId, $parentModuleModel);
		
		$relationModels = $parentModuleModel->getRelations();
		foreach ($relationModels as $relation) {
			$relatedModuleName = $relation->get('relatedModuleName');
			$permissionStatus  = Users_Privileges_Model::isPermitted($relatedModuleName,  'DetailView');
			if($permissionStatus){
				$relationModules[] = $relation;
			}
		}
		
		$relatedRecordsCount = array();
		foreach ($relationModules as $relation) {
			$relationId = $relation->getId();
			$relatedModuleName = $relation->get('relatedModuleName');
			
			$relationListView = Vtiger_RelationListView_Model::getInstance($parentRecordModel, $relatedModuleName, $relation->get('label'));
			$count = $relationListView->getRelatedEntriesCount();
			
			
			$currentUserModel = Users_Record_Model::getCurrentUserModel();
		    $queryGenerator = new QueryGenerator($relatedModuleName, $currentUserModel);
		    $query = $queryGenerator->getQuery();
		    
			$queryComponents = preg_split('/ FROM /i', $query);
    		$query = $queryComponents[0].' ,vtiger_crmentity.crmid FROM '.$queryComponents[1];
            
            $parentModuleBaseTable = $parentModuleModel->basetable;
            
            $getRelatedFieldname = $adb->pquery("SELECT * FROM vtiger_fieldmodulerel INNER JOIN vtiger_field ON vtiger_field.fieldid = vtiger_fieldmodulerel.fieldid WHERE vtiger_fieldmodulerel.module = ? AND vtiger_fieldmodulerel.relmodule = ?", array($relatedModuleName, $module));
            
            $parentModuleDirectRelatedField = $adb->query_result($getRelatedFieldname, 0, 'fieldname');
            
            $parentModuleEntityIdField = $parentModuleModel->basetableid;
            
            $relatedModuleModel = Vtiger_Module_Model::getInstance($relatedModuleName);
            
            $relatedModuleBaseTable = $relatedModuleModel->basetable;
            $relatedModuleEntityIdField = $relatedModuleModel->basetableid;
            
    		$whereSplitQueryComponents = preg_split('/ WHERE /i', $query);
    		$joinQuery = ' INNER JOIN '.$parentModuleBaseTable.' ON '.$parentModuleBaseTable.'.'.$parentModuleEntityIdField." = ".$relatedModuleBaseTable.'.'.$parentModuleDirectRelatedField;
            
    		$query = "$whereSplitQueryComponents[0] $joinQuery WHERE $parentModuleBaseTable.$parentModuleEntityIdField = $parentRecordId AND $whereSplitQueryComponents[1]";
    
            $explodeQuery = explode('FROM', $query);
            
            $finalQuery = "SELECT * FROM ".$explodeQuery[1];
			$result = $adb->pquery($finalQuery, array());
			$count = $adb->num_rows($result);
			
			if($relation->get('label') == 'Activities'){
			    $relationlabel = 'Reminder';
			}else{
			    $relationlabel = $relation->get('label');
			}
			
		    if($count){
		        $relatedRecordsCount[$relationlabel] = $count;
		    }else{
		        $relatedRecordsCount[$relationlabel] = 0;    
		    }
		    
		    
		}
        if($module == 'Project'){
	        $relatedRecordsCount['Bar Chart'] = 0;
	    }
		    
        $response = new Mobile_API_Response();
        $response->setResult($relatedRecordsCount);
        $response->setApiSucessMessage('Successfully Fetched Data');
        return $response;
    }
}
