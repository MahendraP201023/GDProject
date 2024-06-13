<?php

// Turn on debugging level
$Vtiger_Utils_Log = true;

// Include necessary classes
include_once('vtlib/Vtiger/Module.php');

// Define instances
$users = Vtiger_Module::getInstance('ServiceEngineer');

// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_USERLOGIN_ROLE', $users);

$field1 = new Vtiger_Field();
$field1->name = 'serviceengineer_no';
$field1->label = 'ServiceEngineer No';
$field1->table = $users->basetable; 
$field1->column = 'serviceengineer_no';
$field1->columntype = 'VARCHAR(100)';
$field1->uitype = 4;
$field1->typeofdata = 'V~O';
$block->addField($field1);

?> 