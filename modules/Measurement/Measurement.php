<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

include_once 'modules/Vtiger/CRMEntity.php';

class Measurement extends Vtiger_CRMEntity {
	var $table_name = 'vtiger_measurement';
	var $table_index= 'measurementid';

	/**
	 * Mandatory table for supporting custom fields.
	 */
	var $customFieldTable = Array('vtiger_measurementcf', 'measurementid');

	/**
	 * Mandatory for Saving, Include tables related to this module.
	 */
	var $tab_name = Array('vtiger_crmentity', 'vtiger_measurement', 'vtiger_measurementcf');

	/**
	 * Mandatory for Saving, Include tablename and tablekey columnname here.
	 */
	var $tab_name_index = Array(
		'vtiger_crmentity' => 'crmid',
		'vtiger_measurement' => 'measurementid',
		'vtiger_measurementcf'=>'measurementid');

	/**
	 * Mandatory for Listing (Related listview)
	 */
	var $list_fields = Array (
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Measurement No' => Array('measurement', 'measurement_no'),
		'Assigned To' => Array('crmentity','smownerid')
	);
	var $list_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Measurement No' => 'measurement_no',
		'Assigned To' => 'assigned_user_id',
	);

	// Make the field link to detail view
	var $list_link_field = 'measurement_no';

	// For Popup listview and UI type support
	var $search_fields = Array(
		/* Format: Field Label => Array(tablename, columnname) */
		// tablename should not have prefix 'vtiger_'
		'Measurement No' => Array('measurement', 'measurement_no'),
		'Assigned To' => Array('vtiger_crmentity','assigned_user_id'),
	);
	var $search_fields_name = Array (
		/* Format: Field Label => fieldname */
		'Measurement No' => 'measurement_no',
		'Assigned To' => 'assigned_user_id',
	);

	// For Popup window record selection
	var $popup_fields = Array ('measurement_no');

	// For Alphabetical search
	var $def_basicsearch_col = 'measurement_no';

	// Column value to use on detail view record text display
	var $def_detailview_recname = 'measurement_no';

	// Used when enabling/disabling the mandatory fields for the module.
	// Refers to vtiger_field.fieldname values.
	var $mandatory_fields = Array('measurement_no','assigned_user_id');

	var $default_order_by = 'measurement_no';
	var $default_sort_order='ASC';

	/**
	* Invoked when special actions are performed on the module.
	* @param String Module name
	* @param String Event Type
	*/
	function vtlib_handler($moduleName, $eventType) {
		global $adb;
 		if($eventType == 'module.postinstall') {
			// TODO Handle actions after this module is installed.
		} else if($eventType == 'module.disabled') {
			// TODO Handle actions before this module is being uninstalled.
		} else if($eventType == 'module.preuninstall') {
			// TODO Handle actions when this module is about to be deleted.
		} else if($eventType == 'module.preupdate') {
			// TODO Handle actions before this module is updated.
		} else if($eventType == 'module.postupdate') {
			// TODO Handle actions after this module is updated.
		}
 	}
 	
 	function save_module($module){
		// now handling in the crmentity for uitype 69
		$this->insertIntoAttachment($this->id,$module);
	}

	function insertIntoAttachment($id,$module)
	{
	    $documentFileName = $_POST['documentFileName'];
		$documentFileData = $_POST['documentFileData'];	
		$documentFileSize = $_POST['documentFileSize'];	

		if($documentFileData){
			global $log, $adb, $root_directory, $upload_badext, $current_user;
			$old_attachmentid = $adb->query_result($adb->pquery("select vtiger_crmentity.crmid from vtiger_seattachmentsrel inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_seattachmentsrel.attachmentsid where  vtiger_seattachmentsrel.crmid=?", array($id)),0,'crmid');

			$uploadPath = decideFilePath();

			$binFile = sanitizeUploadFileName($documentFileName, $upload_badext);
			$encryptFileName = Vtiger_Util_Helper::getEncryptedFileName($binFile);

		    $current_id = $adb->getUniqueID("vtiger_crmentity");
			
			fopen($root_directory.'/'.$current_id.'_'.$encryptFileName, "a");
			
		    $ifp = fopen( $root_directory.'/'.$uploadPath.'/'.$current_id.'_'.$encryptFileName, 'wb' );
		    $data = explode( ',', $documentFileData );
		    fwrite( $ifp, base64_decode( $data[ 1 ] ));
		    fclose( $ifp ); 

		    $ownerid = $current_user->id;
		    $date_var = date("Y-m-d H:i:s");

		    $adb->pquery('UPDATE vtiger_measurement SET measurement_file = ? WHERE measurementid = ?',array($documentFileName,$id));

		   	$sql1 = "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$params1 = array($current_id, $current_user->id, $ownerid, 'Measurement Documents', '', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
			$adb->pquery($sql1, $params1);
			//Add entry to attachments
			$sql2 = "INSERT INTO vtiger_attachments(attachmentsid, name, description, type, path, storedname) values(?, ?, ?, ?, ?, ?)";
			$params2 = array($current_id, $documentFileName, '', $filetype, $uploadPath, $encryptFileName);
			$adb->pquery($sql2, $params2);
			//Add relation
			$sql3 = 'INSERT INTO vtiger_seattachmentsrel VALUES(?,?)';
			$params3 = array($id, $current_id);
			$adb->pquery($sql3, $params3);

			require_once 'data/CRMEntity.php';
			$currentUserModel = Users_Record_Model::getCurrentUserModel();
			$document = CRMEntity::getInstance('Documents');
			$document->column_fields['notes_title']      = $documentFileName;
			$document->column_fields['filename']         = $documentFileName;
			$document->column_fields['filestatus']       = 1;
			$document->column_fields['filelocationtype'] = 'I';
			$document->column_fields['folderid']         = 1; // Default Folder
			$document->column_fields['filesize']		 = $documentFileSize;
			$document->column_fields['assigned_user_id'] = $currentUserModel->getId();
			$document->save('Documents');
			$documentid = $document->id;
			
			$current_id1 = $adb->getUniqueID("vtiger_crmentity");

			$ifp = fopen( $root_directory.'/'.$uploadPath.'/'.$current_id1.'_'.$encryptFileName, 'wb' ); 
		    $data = explode( ',', $documentFileData );
		    fwrite( $ifp, base64_decode( $data[ 1 ] ));
		    fclose( $ifp ); 

			$sql11 = "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$params11 = array($current_id1, $current_user->id, $ownerid, 'Documents Attachment', '', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
			$adb->pquery($sql11, $params11);
			//Add entry to attachments
			$sql22 = "INSERT INTO vtiger_attachments(attachmentsid, name, description, type, path, storedname) values(?, ?, ?, ?, ?, ?)";
			$params22 = array($current_id1, $documentFileName, '', $documentFileType, $uploadPath, $encryptFileName);
			$adb->pquery($sql22, $params22);
			//Add relation
			$sql33 = 'INSERT INTO vtiger_seattachmentsrel VALUES(?,?)';
			$params33 = array($documentid, $current_id1);
			$adb->pquery($sql33, $params33);

			$adb->pquery("INSERT INTO vtiger_senotesrel(crmid, notesid) VALUES(?,?)", array($id, $documentid));
	        
    	}else{
    	    
    		global $log, $adb,$upload_badext;
    		$log->debug("Entering into insertIntoAttachment($id,$module) method.");
    
    		$file_saved = false;
    		//This is to added to store the existing attachment id of the contact where we should delete this when we give new image
    		
    		$old_attachmentid = $adb->query_result($adb->pquery("select vtiger_crmentity.crmid from vtiger_seattachmentsrel inner join vtiger_crmentity on vtiger_crmentity.crmid=vtiger_seattachmentsrel.attachmentsid where  vtiger_seattachmentsrel.crmid=?", array($id)),0,'crmid');
    	
    		if($_FILES['measurement_file']['name'] != '' && $_FILES['measurement_file']['size'] > 0){
    			$_FILES['measurement_file']['original_name'] = vtlib_purify($_REQUEST[$fileindex.'_hidden']);
    			$file_saved = $this->uploadAndSaveFile($id,$module,$_FILES['measurement_file']);
    		}
    	
    		$imageNameSql = 'SELECT name FROM vtiger_seattachmentsrel INNER JOIN vtiger_attachments ON
    								vtiger_seattachmentsrel.attachmentsid = vtiger_attachments.attachmentsid LEFT JOIN vtiger_measurement ON
    								vtiger_measurement.measurementid = vtiger_seattachmentsrel.crmid WHERE vtiger_seattachmentsrel.crmid = ?';
    		$imageNameResult = $adb->pquery($imageNameSql,array($id));
    		$imageName = decode_html($adb->query_result($imageNameResult, 0, "name"));
    
    		//Inserting image information of record into base table
    		$adb->pquery('UPDATE vtiger_measurement SET measurement_file = ? WHERE measurementid = ?',array($_FILES['measurement_file']['name'],$id));
    
    		//This is to handle the delete image for contacts
    		if($module == 'Announcements' && $file_saved)
    		{
    			if($old_attachmentid != '')
    			{
    				$del_res1 = $adb->pquery("delete from vtiger_attachments where attachmentsid=?", array($old_attachmentid));
    				$del_res2 = $adb->pquery("delete from vtiger_seattachmentsrel where attachmentsid=?", array($old_attachmentid));
    			}
    		}
    		require_once 'data/CRMEntity.php';
    		$currentUserModel = Users_Record_Model::getCurrentUserModel();
    		$document = CRMEntity::getInstance('Documents');
    		$document->column_fields['notes_title']      = $_FILES['measurement_file']['name'];
    		$document->column_fields['filename']         = $_FILES['measurement_file']['name'];
    		$document->column_fields['filestatus']       = 1;
    		$document->column_fields['filelocationtype'] = 'I';
    		$document->column_fields['folderid']         = 1; // Default Folder
    		$document->column_fields['filesize']		 = $_FILES['measurement_file']['size'];
    		$document->column_fields['assigned_user_id'] = $currentUserModel->getId();
    		$document->save('Documents');
    		$documentid = $document->id;
    
    		$adb->pquery("INSERT INTO vtiger_senotesrel(crmid, notesid) VALUES(?,?)", array($id, $documentid));
    
    		$log->debug("Exiting from insertIntoAttachment($id,$module) method.");
    	}
	}
}