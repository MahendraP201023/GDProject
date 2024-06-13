<?php 
// Turn on debugging level
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');

$module = new Vtiger_Module();
$module->name = 'Onboarding';//(No space in module name)
$module->save();

$module->initTables();
$module->initWebservice();

$menu = Vtiger_Menu::getInstance('Sales');
$menu->addModule($module);

$block1 = new Vtiger_Block();
$block1->label = 'Onboarding Information';
$module->addBlock($block1); //to create a new block

$field21 = new Vtiger_Field();
$field21->name = 'onboarding_image';
$field21->label = 'Onboarding Image';
$field21->table = $module->basetable; 
$field21->column = 'onboarding_image';
$field21->columntype = 'VARCHAR(255)';
$field21->uitype = 28;
$field21->typeofdata = 'V~O';
$block1->addField($field21);

$field2 = new Vtiger_Field();
$field2->name = 'onboarding_text';
$field2->label = 'Text';
$field2->table = $module->basetable; 
$field2->column = 'onboarding_text';
$field2->columntype = 'TEXT';
$field2->uitype = 21;
$field2->typeofdata = 'V~O';
$block1->addField($field2);


$field1 = new Vtiger_Field();
$field1->name = 'onboarding_no';
$field1->label = 'Onboarding No';
$field1->table = $module->basetable; 
$field1->column = 'onboarding_no';
$field1->columntype = 'VARCHAR(100)';
$field1->uitype = 4;
$field1->typeofdata = 'V~O';
$block1->addField($field1);

$mfield2 = new Vtiger_Field();
$mfield2->name = 'createdtime';
$mfield2->label= 'Created Time';
$mfield2->table = 'vtiger_crmentity';
$mfield2->column = 'createdtime';
$mfield2->uitype = 70;
$mfield2->typeofdata = 'DT~O';
$mfield2->displaytype= 2;
$block1->addField($mfield2);

$mfield3 = new Vtiger_Field();
$mfield3->name = 'modifiedtime';
$mfield3->label= 'Modified Time';
$mfield3->table = 'vtiger_crmentity';
$mfield3->column = 'modifiedtime';
$mfield3->uitype = 70;
$mfield3->typeofdata = 'DT~O';
$mfield3->displaytype= 2;
$block1->addField($mfield3);

//Do not change any value for filed2.
$field211 = new Vtiger_Field();
$field211->name = 'assigned_user_id';
$field211->label = 'Assigned To';
$field211->table = 'vtiger_crmentity'; 
$field211->column = 'smownerid';
$field211->columntype = 'int(19)';
$field211->uitype = 53;
$field211->typeofdata = 'V~M';
$block1->addField($field211);

$filter1 = new Vtiger_Filter();
$filter1->name = 'All';
$filter1->isdefault = true;
$module->addFilter($filter1);
// Add fields to the filter created
$filter1->addField($field21, 1);
$filter1->addField($field1, 2);
$filter1->addField($field2, 3);


/** Set sharing access of this module */
$module->setDefaultSharing('Private'); 
/** Enable and Disable available tools */
$module->enableTools(Array('Import', 'Export'));
$module->disableTools('Merge');