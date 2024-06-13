<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

class Potentials_DesignAttachment_View extends Vtiger_IndexAjax_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('design2DAttachmentPopup');
		$this->exposeMethod('save2DDesignAttachment');

		$this->exposeMethod('design3DAttachmentPopup');
		$this->exposeMethod('save3DDesignAttachment');
	}

	function process(Vtiger_Request $request) {
		$mode = $request->get('mode');
		if(!empty($mode)) {
			$this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	function design2DAttachmentPopup(Vtiger_Request $request) {
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$designType = $request->get('designType');
		$recordId = $request->get('recordId');

		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('recordId', $recordId);

		echo $viewer->view('2Dattachment.tpl', $moduleName, true);
	}

	function save2DDesignAttachment(Vtiger_Request $request) {
		global $adb, $current_user, $upload_badext;
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$designType = $request->get('designType');
		$recordId = $request->get('recordId');

		$contactDetail = Potentials_DesignAttachment_View::getContactDetail($recordId);
		$contactname = $contactDetail['contactname'];

		$currentDate = date('Y-m-d');
		
		$siteVisitRecordModel = Vtiger_Record_Model::getCleanInstance('Sitevisit');
		$siteVisitRecordModel->set('visitdate', $currentDate);
		$siteVisitRecordModel->set('sitevisit_oppid', $recordId);
		$siteVisitRecordModel->set('contactname', $contactname);
		$siteVisitRecordModel->save();

		$siteVisitId = $siteVisitRecordModel->getId();
		
		$current_id = $adb->getUniqueID("vtiger_crmentity");
		if (!isset($ownerid) || $ownerid == '')
            $ownerid = $current_user->id;
		
		$attachmentType = 'Attachment';
		$date_var = date("Y-m-d H:i:s");
		
		$filename = $_FILES['2DDesign']['name'];
		$filetype = $_FILES['2DDesign']['type'];
		$filetmp_name = $_FILES['2DDesign']['tmp_name'];
		$upload_file_path = decideFilePath();
		$encryptFileName = Vtiger_Util_Helper::getEncryptedFileName($_FILES['2DDesign']['name']);
		
		$upload_status = copy($filetmp_name, $upload_file_path . $current_id . "_" . $encryptFileName);
		
		$adb->pquery("UPDATE vtiger_sitevisit SET imagename = '".$_FILES['2DDesign']['name']."' WHERE sitevisitid = ?", array($siteVisitId));
		
		$sql1 = "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params1 = array($current_id, $current_user->id, $ownerid, 'Sitevisit' . " " . $attachmentType, '', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
        $adb->pquery($sql1, $params1);
        $sql2 = "INSERT INTO vtiger_attachments(attachmentsid, name, description, type, path, storedname,subject) values(?, ?, ?, ?, ?, ?,?)";
        $params2 = array($current_id, $filename, NULL, $filetype, $upload_file_path, $encryptFileName, '');
        $adb->pquery($sql2, $params2);
        $sql3 = 'INSERT INTO vtiger_seattachmentsrel VALUES(?,?)';
        $params3 = array($siteVisitId, $current_id);
        $adb->pquery($sql3, $params3);
        
        $loadUrl = 'index.php?module=Potentials&view=Detail&record='.$recordId.'&mode=showDetailViewByMode&requestMode=summary&tab_label=Opportunity Summary&app=SALES';
		header("Location: $loadUrl");
		
	}

	function design3DAttachmentPopup(Vtiger_Request $request) {
		$viewer = $this->getViewer($request);
		$moduleName = $request->getModule();
		$designType = $request->get('designType');
		$recordId = $request->get('recordId');

		$viewer->assign('MODULE', $moduleName);
		$viewer->assign('recordId', $recordId);

		echo $viewer->view('3Dattachment.tpl', $moduleName, true);
	}

	function save3DDesignAttachment(Vtiger_Request $request) {
		global $adb, $current_user, $upload_badext;
		$viewer = $this->getViewer($request);	
		$moduleName = $request->getModule();
		$designType = $request->get('designType');
		$recordId = $request->get('recordId');

		$contactDetail = Potentials_DesignAttachment_View::getContactDetail($recordId);
		$contactname = $contactDetail['contactname'];

		$currentDate = date('Y-m-d');
		
		$siteVisitRecordModel = Vtiger_Record_Model::getCleanInstance('Sitevisit');
		$siteVisitRecordModel->set('visitdate', $currentDate);
		$siteVisitRecordModel->set('sitevisit_oppid', $recordId);
		$siteVisitRecordModel->set('contactname', $contactname);
		$siteVisitRecordModel->save();
        
        $siteVisitId = $siteVisitRecordModel->getId();
        
		$current_id = $adb->getUniqueID("vtiger_crmentity");
		if (!isset($ownerid) || $ownerid == '')
            $ownerid = $current_user->id;
		
		$attachmentType = 'Attachment';
		$date_var = date("Y-m-d H:i:s");
		
		$filename = $_FILES['3DDesign']['name'];
		$filetype = $_FILES['3DDesign']['type'];
		$filetmp_name = $_FILES['3DDesign']['tmp_name'];
		$upload_file_path = decideFilePath();
		$encryptFileName = Vtiger_Util_Helper::getEncryptedFileName($_FILES['3DDesign']['name']);
		
		$upload_status = copy($filetmp_name, $upload_file_path . $current_id . "_" . $encryptFileName);
		
		$adb->pquery("UPDATE vtiger_sitevisit SET imagename1 = '".$_FILES['3DDesign']['name']."' WHERE sitevisitid = ?", array($siteVisitId));
		
		$sql1 = "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,setype,description,createdtime,modifiedtime) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params1 = array($current_id, $current_user->id, $ownerid, 'Sitevisit' . " " . $attachmentType, '', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
        $adb->pquery($sql1, $params1);
        $sql2 = "INSERT INTO vtiger_attachments(attachmentsid, name, description, type, path, storedname,subject) values(?, ?, ?, ?, ?, ?,?)";
        $params2 = array($current_id, $filename, NULL, $filetype, $upload_file_path, $encryptFileName, '');
        $adb->pquery($sql2, $params2);
        $sql3 = 'INSERT INTO vtiger_seattachmentsrel VALUES(?,?)';
        $params3 = array($siteVisitId, $current_id);
        $adb->pquery($sql3, $params3);
        
        $loadUrl = 'index.php?module=Potentials&view=Detail&record='.$recordId.'&mode=showDetailViewByMode&requestMode=summary&tab_label=Opportunity Summary&app=SALES';
		header("Location: $loadUrl");
	}

	function getContactDetail($recordId){
		$oppRecordModel = Vtiger_Record_Model::getInstanceById($recordId);
		$contact_id = $oppRecordModel->get('contact_id');
		if($contact_id){
			$contcactRecordModel = Vtiger_Record_Model::getInstanceById($contact_id);
			$contactname = $contcactRecordModel->get('firstname').' '.$contcactRecordModel->get('lastname');
		}

		$contactDetail = array('contactname' => $contactname);
		return $contactDetail;
	}
}