<?php

// Turn on debugging level
$Vtiger_Utils_Log = true;

// Include necessary classes
include_once('vtlib/Vtiger/Module.php');


$module = Vtiger_Module::getInstance('Events');

// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_EVENT_INFORMATION', $module);

$field018 = new Vtiger_Field();
$field018->name = 'event_projecttaskid'; 
$field018->label = 'Project'; 
$field018->table = 'vtiger_activity'; 
$field018->column = 'event_projecttaskid';
$field018->uitype = 10; 
$field018->typeofdata = 'V~O'; 
$block->addField($field018); 
$field018->setRelatedModules(Array('ProjectTask'));

?> 