<?php 

// Turn on debugging level
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');

$module = new Vtiger_Module();
$module->name = 'Measurement';//(No space in module name)
$module->save();

$module->initTables();
$module->initWebservice();

$menu = Vtiger_Menu::getInstance('SALES');
$menu->addModule($module);

$block1 = new Vtiger_Block();
$block1->label = 'Measurement Information';
$module->addBlock($block1); //to create a new block

$field0 = new Vtiger_Field();
$field0->name = 'measurement_description';
$field0->label = 'Measurement';
$field0->table = $module->basetable; 
$field0->column = 'measurement_description';
$field0->columntype = 'TEXT';
$field0->uitype = 19;
$field0->typeofdata = 'V~M';
$block1->addField($field0);

$field018 = new Vtiger_Field();
$field018->name = 'measurement_project'; 	
$field018->label = 'Project Name'; 
$field018->column = 'measurement_project';
$field018->uitype = 10; 
$field018->typeofdata = 'V~M'; 
$block1->addField($field018); 
$field018->setRelatedModules(Array('Project'));	

$field1 = new Vtiger_Field();
$field1->name = 'measurement_no';
$field1->label = 'Measurement No';
$field1->table = $module->basetable; 
$field1->column = 'measurement_no';
$field1->columntype = 'VARCHAR(100)';
$field1->uitype = 4;
$field1->typeofdata = 'V~O';
$module->setEntityIdentifier($field1);
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
$field2 = new Vtiger_Field();
$field2->name = 'assigned_user_id';
$field2->label = 'Assigned To';
$field2->table = 'vtiger_crmentity'; 
$field2->column = 'smownerid';
$field2->columntype = 'int(19)';
$field2->uitype = 53;
$field2->typeofdata = 'V~M';
$block1->addField($field2);

$filter1 = new Vtiger_Filter();
$filter1->name = 'All';
$filter1->isdefault = true;
$module->addFilter($filter1);
// Add fields to the filter created
$filter1->addField($field0, 1);
$filter1->addField($field1, 2);
$filter1->addField($field2, 3);


/** Set sharing access of this module */
$module->setDefaultSharing('Private'); 
/** Enable and Disable available tools */
$module->enableTools(Array('Import', 'Export'));
$module->disableTools('Merge');