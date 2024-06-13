<?php

// Turn on debugging level
$Vtiger_Utils_Log = true;

// Include necessary classes
include_once('vtlib/Vtiger/Module.php');

// Define instances
$users = Vtiger_Module::getInstance('ExtraWork');

// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('ExtraWork Information', $users);

$field3 = new Vtiger_Field();
$field3->name = 'extrawork_date';
$field3->label = 'Extra Work Date';
$field3->table = $module->basetable; 
$field3->column = 'extrawork_date';
$field3->columntype = 'DATE';
$field3->uitype = 5;
$field3->typeofdata = 'D~O';
$block->addField($field3);

?> 