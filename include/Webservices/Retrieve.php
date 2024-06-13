<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
	function vtws_retrieve($id, $user){

		global $log,$adb;
		
		$webserviceObject = VtigerWebserviceObject::fromId($adb,$id);
		$handlerPath = $webserviceObject->getHandlerPath();
		$handlerClass = $webserviceObject->getHandlerClass();
		
		require_once $handlerPath;
		
		$handler = new $handlerClass($webserviceObject,$user,$adb,$log);
		$meta = $handler->getMeta();
		$entityName = $meta->getObjectEntityName($id);
		$types = vtws_listtypes(null, $user);
		if(!in_array($entityName,$types['types'])){
			throw new WebServiceException(WebServiceErrorCode::$ACCESSDENIED,"Permission to perform the operation is denied");
		}
		if($meta->hasReadAccess()!==true){
			throw new WebServiceException(WebServiceErrorCode::$ACCESSDENIED,"Permission to write is denied");
		}

		if($entityName !== $webserviceObject->getEntityName()){
			throw new WebServiceException(WebServiceErrorCode::$INVALIDID,"Id specified is incorrect");
		}
		
		if(!$meta->hasPermission(EntityMeta::$RETRIEVE,$id)){
			throw new WebServiceException(WebServiceErrorCode::$ACCESSDENIED,"Permission to read given object is denied");
		}
		
		$idComponents = vtws_getIdComponents($id);
		if(!$meta->exists($idComponents[1])){
			throw new WebServiceException(WebServiceErrorCode::$RECORDNOTFOUND,"Record you are trying to access is not found");
		}
		
		$entity = $handler->retrieve($id);
	
		$newEntity = array();

        $fieldsToRemove = array('source','measurement_no','extrawork_no','salutationtype','modifiedby','duration_hours','recurringtype','duration_minutes','notime');

        if ($_REQUEST['view'] == 'SaveConvertLead') {
            foreach ($entity as $key => $value) {
                if (!in_array($key, $fieldsToRemove)) {
                    $newEntity[$key] = $value;
                }
            }
        } else {
            if ($_REQUEST['path'] == 'saveRecord') {
                foreach ($entity as $key => $value) {
                    if (!in_array($key, $fieldsToRemove)) {
                        $newEntity[$key] = $value;
                    }
                }
            } else {
            global $adb;
            foreach ($entity as $key => $value) {
                if (!in_array($key, $fieldsToRemove)) {
                    $fieldTypeQuery = $adb->pquery("SELECT uitype FROM vtiger_field WHERE fieldname = ? AND tabid = ? AND presence IN ('0','2')", array($key, getTabid($_REQUEST['module'])));
                    if ($adb->num_rows($fieldTypeQuery) > 0) {
                        $fieldType = $adb -> query_result($fieldTypeQuery, 0, 'uitype');

                        if ($fieldType == 56) { // 56 is the UI type for boolean
                            $value = $value ? 'Yes' : 'No';
                        }
                        
                        if($_REQUEST['module'] == 'Project'){
                            if($key == 'linktoaccountscontacts'){
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }else if($key == 'project_opportunityid'){
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                            
                            if($key == 'project_file'){
                                global $site_URL;
                                $db = PearDatabase::getInstance();
                                $explodeId = explode('x', $id);
                                $sql = "SELECT vtiger_attachments.*, vtiger_crmentity.setype FROM vtiger_attachments
            						INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid
            						INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_attachments.attachmentsid
            						WHERE vtiger_seattachmentsrel.crmid = ?";
                    			$result = $db->pquery($sql, array($explodeId[1]));
                    
                    			$imageId = $db->query_result($result, 0, 'attachmentsid');
                    			$imagePath = $db->query_result($result, 0, 'path');
                    			$projectimageName = $db->query_result($result, 0, 'name');
                                $url = \Vtiger_Functions::getFilePublicURL($imageId, $imageName);
                    			//decode_html - added to handle UTF-8 characters in file names
                    			$imageOriginalName = urlencode(decode_html($imageName));
                                if($url) {
                                    $url = $site_URL.$url;
                                }
                                $value = $url;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'ProjectTask'){
                            if($key == 'projectid'){
                                $project_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                            
                            if($key == 'projecttask_file'){
                                global $site_URL;
                                $db = PearDatabase::getInstance();
                                $explodeId = explode('x', $id);
                                $sql = "SELECT vtiger_attachments.*, vtiger_crmentity.setype FROM vtiger_attachments
            						INNER JOIN vtiger_seattachmentsrel ON vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid
            						INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid = vtiger_attachments.attachmentsid
            						WHERE vtiger_seattachmentsrel.crmid = ?";
                    			$result = $db->pquery($sql, array($explodeId[1]));
                    
                    			$imageId = $db->query_result($result, 0, 'attachmentsid');
                    			$imagePath = $db->query_result($result, 0, 'path');
                    			$projecttaskimageName = $db->query_result($result, 0, 'name');
                                $url = \Vtiger_Functions::getFilePublicURL($imageId, $imageName);
                    			//decode_html - added to handle UTF-8 characters in file names
                    			$imageOriginalName = urlencode(decode_html($imageName));
                                if($url) {
                                    $url = $site_URL.$url;
                                }
                                $value = $url;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'Measurement'){
                            if($key == 'mmprojecttask_id'){
                                $msprojecttask_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }else if($key == 'measurement_project'){
                                $msproject_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'MeetingNotes'){
                            if($key == 'mnprojecttask_id'){
                                $mnprojecttask_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }else if($key == 'project_name'){
                                $mnproject_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'ExtraWork'){
                            if($key == 'ewprojecttask_id'){
                                $ewprojecttask_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }else if($key == 'extrawork_project'){
                                $ewproject_id = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'Calendar' || $_REQUEST['module'] == 'Events'){
                            if($key == 'event_projectid'){
                                $event_projectid = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }else if($key == 'event_projecttaskid'){
                                $event_projecttaskid = $value;
                                $explodeId = explode('x', $value);
                                $getLabel = $adb->pquery("SELECT * FROM vtiger_crmentity WHERE crmid = ?", array($explodeId[1]));
                                $label = $adb->query_result($getLabel, 0, 'label');
                                $value = $label;
                            }
                        }
                        
        				$fieldLabelQuery = $adb->pquery("SELECT * FROM vtiger_field WHERE fieldname = ? AND tabid = ?", array($key, getTabid($_REQUEST['module'])));
        				$fieldLabel = $adb->query_result($fieldLabelQuery, 0, 'fieldlabel');
        				$block = $adb->query_result($fieldLabelQuery, 0, 'block');
        
        				$getmoduleBlock = $adb->pquery("SELECT * FROM vtiger_blocks WHERE blockid = ?", array($block));
        				$blocklabel = $adb->query_result($getmoduleBlock, 0, 'blocklabel');
        				
        				if($key == 'assigned_user_id'){
        				    $assign_users = $value;
    						$userId = explode('x', $value);
    						$getUserName = $adb->pquery("SELECT * FROM vtiger_users WHERE id = ?", array($userId[1]));
    						$userRows = $adb->num_rows($getUserName);
    						if($userRows){
    						    $userName = $adb->query_result($getUserName, 0, 'first_name').' '.$adb->query_result($getUserName, 0, 'last_name');
    						    $value = $userName;
    						}else{
    						    $getgroupName = $adb->pquery("SELECT * FROM vtiger_groups WHERE groupid = ?", array($userId[1]));
    						    $userName = $adb->query_result($getgroupName, 0, 'groupname');
    						    $value = $userName;
    						}
    					}
    					
    					if($_REQUEST['module'] == 'ProjectTask'){
                            if($key == 'projectid'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Related To-ID'] = $project_id;
                            }else if($key == 'projecttask_file'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Upload File-ID'] = $value;
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Upload File Name'] = $projecttaskimageName;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'Project'){
                            if($key == 'project_file'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Upload File-ID'] = $value;
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Upload File Name'] = $projectimageName;
                            }
                        }
                        
                        
                        if($_REQUEST['module'] == 'Measurement'){
                            if($key == 'mmprojecttask_id'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Task Related To-ID'] = $msprojecttask_id;
                            }else if($key == 'measurement_project'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Related To-ID'] = $msproject_id;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'MeetingNotes'){
                            if($key == 'mnprojecttask_id'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Task Related To-ID'] = $mnprojecttask_id;
                            }else if($key == 'project_name'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Related To-ID'] = $mnproject_id;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'ExtraWork'){
                            if($key == 'ewprojecttask_id'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Task Related To-ID'] = $ewprojecttask_id;
                            }else if($key == 'extrawork_project'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Related To-ID'] = $ewproject_id;
                            }
                        }
                        
                        if($_REQUEST['module'] == 'Calendar' || $_REQUEST['module'] == 'Events'){
                            if($key == 'event_projecttaskid'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Task Related To-ID'] = $event_projecttaskid;
                            }else if($key == 'event_projectid'){
                                $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Project Related To-ID'] = $event_projectid;
                            }
                        }
                        
                        if($key == 'assigned_user_id'){
                            $newEntity[vtranslate($blocklabel, $_REQUEST['module'])]['Assigned To-ID'] = $assign_users;
                        }
    					
        				if($fieldLabel == ''){
        					$newEntity[vtranslate($blocklabel, $_REQUEST['module'])][$key] = $value;
        				}else{
        				    if($fieldLabel != 'Upload File'){
        				        $newEntity[vtranslate($blocklabel, $_REQUEST['module'])][$fieldLabel] = $value;
        				    }
        				}
                    }
    			}
			}
		}
    }
		VTWS_PreserveGlobal::flush();
		return $newEntity;
	}
?>
