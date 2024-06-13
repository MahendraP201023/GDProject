<?php
require_once("modules/com_vtiger_workflow/include.inc");
require_once("modules/com_vtiger_workflow/tasks/VTEntityMethodTask.inc");
require_once("modules/com_vtiger_workflow/VTEntityMethodManager.inc");
require_once("include/database/PearDatabase.php");
$adb = PearDatabase::getInstance();
$emm = new VTEntityMethodManager($adb);
require_once 'vtlib/Vtiger/Module.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;
$invoiceModule = Vtiger_Module::getInstance('MeetingNotes');
$blockInstance = Vtiger_Block::getInstance('LBL_BLOCK_GENERAL_INFORMATION', $invoiceModule);
if ($blockInstance) {
    $fieldInstance = Vtiger_Field::getInstance('project_name', $invoiceModule);
    if (!$fieldInstance) {
        $field = new Vtiger_Field();
        $field->name = 'project_name';
        $field->column = 'project_name';
        $field->uitype = 10;
        $field->table = $invoiceModule->basetable;
        $field->label = 'Project Name';
        $field->summaryfield = 1;
        $field->readonly = 1;
        $field->presence = 2;
        $field->typeofdata = 'I~O';
        $field->columntype = 'INT(10)';
        $field->quickcreate = 3;
        $field->displaytype = 1;
        $field->masseditable = 1;
        $id = $blockInstance->addFieldIgnite($field);
        echo "igggggggggggggggggggg mission created field --- $id ";
        // ------------------ invoga
        $invogamoduleInstance = Vtiger_Module::getInstance('Project');
        $relationLabel  = 'Meeting Notes';
        $invogamoduleInstance->setRelatedList(
            $invoiceModule,
            $relationLabel,
            array('ADD'),
            'get_dependents_list' //you can do select also Array('ADD','SELECT')
        );
        // ------------------------invoga
        $tom = "INSERT INTO `vtiger_fieldmodulerel` (`fieldid`, `module`, `relmodule`, `status`, `sequence`) VALUES ('$id', 'MeetingNotes', 'Project', NULL, NULL)";
        $adb->pquery($tom);
    } else {
        echo "field is present -- plant_name  in MeetingNotes--- <br>";
    }
} else {
    echo "Block Does not exits -- LBL_BLOCK_GENERAL_INFORMATION in MeetingNotes -- <br>";
}
$invoiceModule = null;
$blockInstance = null;
$fieldInstance = null;