<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Leads_FollowUp_View extends Vtiger_IndexAjax_View {

	function __construct() {
		parent::__construct();
		$this->exposeMethod('follow1st');
		$this->exposeMethod('follow2nd');
		$this->exposeMethod('inccaVisit');
		$this->exposeMethod('follow3rd');
		$this->exposeMethod('advancePayment');
		$this->exposeMethod('quotesReady');
		$this->exposeMethod('siteVisit');
		$this->exposeMethod('design2d');
		$this->exposeMethod('design3d');
	}

	function process(Vtiger_Request $request) {
		$mode = $request->getMode();
		if(!empty($mode)) {
			echo $this->invokeExposedMethod($mode, $request);
			return;
		}
	}

	public function follow1st(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$follow1st = $request->get('checkboxvalue');
		if($follow1st == 'true'){
			$followup1st = 1;
		}else if($follow1st == 'false'){
			$followup1st = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_leads_followup WHERE leadsid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_leads_followup SET 1stfollow = ? WHERE leadsid = ?", array($followup1st, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_leads_followup(leadsid, 1stfollow, 2ndfollow, 3rdfollow) VALUES (?,?,?,?)", array($recordId, $followup1st, 0, 0));
		}
	}

	public function follow2nd(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$follow2nd = $request->get('checkboxvalue');
		if($follow2nd == 'true'){
			$followup2nd = 1;
		}else if($follow2nd == 'false'){
			$followup2nd = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_leads_followup WHERE leadsid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_leads_followup SET 2ndfollow = ? WHERE leadsid = ?", array($followup2nd, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_leads_followup(leadsid, 1stfollow, 2ndfollow, 3rdfollow) VALUES (?,?,?,?)", array($recordId, 0, $followup2nd, 0));
		}
	}
	
	public function inccaVisit(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$inccaVisit = $request->get('checkboxvalue');
		if($inccaVisit == 'true'){
			$inccaVisits = 1;
		}else if($inccaVisit == 'false'){
			$inccaVisits = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_leads_followup WHERE leadsid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_leads_followup SET inccaVisit = ? WHERE leadsid = ?", array($inccaVisits, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_leads_followup(leadsid, 1stfollow, 2ndfollow, inccaVisit, 3rdfollow) VALUES (?,?,?,?,?)", array($recordId, 0, 0, $inccaVisits, 0));
		}
	}

	public function follow3rd(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$follow3rd = $request->get('checkboxvalue');
		if($follow3rd == 'true'){
			$followup3rd = 1;
		}else if($follow3rd == 'false'){
			$followup3rd = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_leads_followup WHERE leadsid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_leads_followup SET 3rdfollow = ? WHERE leadsid = ?", array($followup3rd, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_leads_followup(leadsid, 1stfollow, 2ndfollow, 3rdfollow) VALUES (?,?,?,?)", array($recordId, 0, 0, $followup3rd));
		}
	}

	public function advancePayment(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$advancePayment = $request->get('checkboxvalue');
		if($advancePayment == 'true'){
			$advancePayment = 1;
		}else if($advancePayment == 'false'){
			$advancePayment = 0;
		}
		
		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_oppo_followup WHERE oppoid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_oppo_followup SET advancePayment = ? WHERE oppoid = ?", array($advancePayment, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_oppo_followup(oppoid, advancePayment, quotesReady, siteVisit, design2d, design3d) VALUES (?,?,?,?,?,?)", array($recordId, $advancePayment, 0, 0, 0, 0));
		}
	}

	public function quotesReady(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$quotesReady = $request->get('checkboxvalue');
		if($quotesReady == 'true'){
			$quotesReady = 1;
		}else if($quotesReady == 'false'){
			$quotesReady = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_oppo_followup WHERE oppoid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_oppo_followup SET quotesReady = ? WHERE oppoid = ?", array($quotesReady, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_oppo_followup(oppoid, advancePayment, quotesReady, siteVisit, design2d, design3d) VALUES (?,?,?,?,?,?)", array($recordId, 0, $quotesReady, 0, 0, 0));
		}
	}

	public function siteVisit(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$siteVisit = $request->get('checkboxvalue');
		if($siteVisit == 'true'){
			$siteVisit = 1;
		}else if($siteVisit == 'false'){
			$siteVisit = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_oppo_followup WHERE oppoid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_oppo_followup SET siteVisit = ? WHERE oppoid = ?", array($siteVisit, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_oppo_followup(oppoid, advancePayment, quotesReady, siteVisit, design2d, design3d) VALUES (?,?,?,?,?,?)", array($recordId, 0, 0, $siteVisit, 0, 0));
		}
	}

	public function design2d(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$design2d = $request->get('checkboxvalue');
		if($design2d == 'true'){
			$design2d = 1;
		}else if($design2d == 'false'){
			$design2d = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_oppo_followup WHERE oppoid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_oppo_followup SET design2d = ? WHERE oppoid = ?", array($design2d, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_oppo_followup(oppoid, advancePayment, quotesReady, siteVisit, design2d, design3d) VALUES (?,?,?,?,?,?)", array($recordId, 0, 0, 0, $design2d, 0));
		}
	}

	public function design3d(Vtiger_Request $request) {
		$recordId = $request->get('record');
		$design3d = $request->get('checkboxvalue');
		if($design3d == 'true'){
			$design3d = 1;
		}else if($design3d == 'false'){
			$design3d = 0;
		}

		global $adb;
		$query = $adb->pquery("SELECT * FROM vtiger_oppo_followup WHERE oppoid = ?", array($recordId));
		$row = $adb->num_rows($query);
		if($row){
			$adb->pquery("UPDATE vtiger_oppo_followup SET design3d = ? WHERE oppoid = ?", array($design3d, $recordId));
		}else{
			$adb->pquery("INSERT INTO vtiger_oppo_followup(oppoid, advancePayment, quotesReady, siteVisit, design2d, design3d) VALUES (?,?,?,?,?,?)", array($recordId, 0, 0, 0, 0, $design3d));
		}
	}

}
