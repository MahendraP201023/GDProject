<?php

class Settings_StatusLabel_StatusLabelConfig_View extends Settings_Vtiger_Index_View {

    function __construct() {
        parent::__construct();
        $this->exposeMethod('statusLabelSetting');
        $this->exposeMethod('saveStatusLabel');
    }
 
    function process(Vtiger_Request $request) {
        $mode = $request->get('mode');
        if(!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
            return;
        }
    }

    function statusLabelSetting(Vtiger_Request $request) {
        $qualifiedModuleName = $request->getModule(false);
        $mode = $request->getMode(); 
        $moduleName = $request->getModule(); 
        global $adb;
        $getStatuslableRecord = $adb->pquery("SELECT * from vtiger_modulestatus_label");
        $row = $adb->num_rows($getStatuslableRecord);

        $record = $adb->fetchByAssoc($getStatuslableRecord);
        $advance_payment = $record['advance_payment'];
        $quotes_ready = $record['quotes_ready'];
        $site_visit = $record['site_visit'];
        $design_1 = $record['design_1'];
        $design_2 = $record['design_2'];
        $followup_1 = $record['followup_1'];
        $followup_2 = $record['followup_2'];
        $innca_visit = $record['innca_visit'];
        $followup_3 = $record['followup_3'];
        $payment_received = $record['payment_received'];
        $implementation = $record['implementation'];
        $installation = $record['installation'];
        $site_verification = $record['site_verification'];
        $closure = $record['closure'];
        // echo "<pre>";
        // print_r($record);exit;
        
   
        $viewer = $this->getViewer($request);
        $viewer->assign('ADVANCE_PAYMENT', $advance_payment);
        $viewer->assign('QUOTES_READY', $quotes_ready);
        $viewer->assign('SITE_VISIT', $site_visit);
        $viewer->assign('DESIGN_1', $design_1);
        $viewer->assign('DESIGN_2', $design_2);
        $viewer->assign('FOLLOWUP_1', $followup_1);
        $viewer->assign('FOLLOWUP_2', $followup_2);
        $viewer->assign('INNCA_VISIT', $innca_visit);
        $viewer->assign('FOLLOWUP_3', $followup_3);
        $viewer->assign('DISC_PAYMENT_RECEIVED', $payment_received);
        $viewer->assign('IMPLEMENT', $implementation);
        $viewer->assign('INSTALLATION', $installation);
        $viewer->assign('SITE_VERFICATION', $site_verification);
        $viewer->assign('CLOSURE', $closure);
        $viewer->view('StatusLabelConfig.tpl', $qualifiedModuleName);
    
    }
    function saveStatusLabel(Vtiger_Request $request){
        $mode = $request->getMode(); 
		$moduleName = $request->getModule(); 
        $advance_payment = $request->get('advance_payment');
        $quotes_ready = $request->get('quotes_ready');
        $site_visit = $request->get('site_visit');
        $design_1 = $request->get('design_1');
        $design_2 = $request->get('design_2');
        $followup_1 = $request->get('followup_1');
        $followup_2 = $request->get('followup_2');
        $innca_visit = $request->get('innca_visit');
        $followup_3 = $request->get('followup_3');
        $payment_received = $request->get('payment_received');
        $implementation = $request->get('implementation');
        $installation = $request->get('installation');
        $site_verification = $request->get('site_verification');
        $closure = $request->get('closure');
    
       global $adb;
       $getStatuslableRecord = $adb->pquery("SELECT * FROM vtiger_modulestatus_label");
       $row = $adb->num_rows($getStatuslableRecord);
        if($row){
            $delete = $adb->pquery("DELETE FROM vtiger_modulestatus_label");
        }
        $insert = $adb->pquery("INSERT INTO vtiger_modulestatus_label (advance_payment, quotes_ready, site_visit, design_1, design_2, followup_1, followup_2, innca_visit, followup_3, payment_received, implementation, installation, site_verification, closure) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($advance_payment, $quotes_ready, $site_visit, $design_1, $design_2, $followup_1, $followup_2, $innca_visit,  $followup_3, $payment_received, $implementation,  $installation, $site_verification,  $closure));
        header("Location: index.php?module=StatusLabel&parent=Settings&view=StatusLabelConfig&mode=statusLabelSetting&block=4&fieldid=41");
    }
    
    /**
     * Function to get the list of Script models to be included
     * @param Vtiger_Request $request
     * @return <Array> - List of Vtiger_JsScript_Model instances
     */
    function getHeaderScripts(Vtiger_Request $request) {
        $headerScriptInstances = parent::getHeaderScripts($request);
        $moduleName = $request->getModule();

        $jsFileNames = array(
            "modules.Settings.StatusLabel.resources.StatusLabelConfig"
        );

        $jsScriptInstances = $this->checkAndConvertJsScripts($jsFileNames);
        $headerScriptInstances = array_merge($headerScriptInstances, $jsScriptInstances);
        return $headerScriptInstances;
    }

}

?>