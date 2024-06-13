<?php

// Turn on debugging level
$Vtiger_Utils_Log = true;

// Include necessary classes
include_once('vtlib/Vtiger/Module.php');


$module = Vtiger_Module::getInstance('Project');

// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_PROJECT_INFORMATION', $module);

$field018 = new Vtiger_Field();
$field018->name = 'project_opportunityid'; 
$field018->label = 'Opportunity'; 
$field018->column = 'project_opportunityid';
$field018->table = $module->basetable; 
$field018->uitype = 10; 
$field018->typeofdata = 'V~O'; 
$block->addField($field018); 
$field018->setRelatedModules(Array('Potentials'));

?> 