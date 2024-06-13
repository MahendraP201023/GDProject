<?php

// Turn on debugging level
$Vtiger_Utils_Log = true;

// Include necessary classes
include_once('vtlib/Vtiger/Module.php');

// Define instances
$users = Vtiger_Module::getInstance('ProjectTask');

// Nouvelle instance pour le nouveau bloc
$block = Vtiger_Block::getInstance('LBL_PROJECT_TASK_INFORMATION', $users);

$field21 = new Vtiger_Field();
$field21->name = 'projecttask_file';
$field21->label = 'Upload File';
$field21->table = $users->basetable; 
$field21->column = 'projecttask_file';
$field21->columntype = 'VARCHAR(255)';
$field21->uitype = 28;
$field21->typeofdata = 'V~O';
$block->addField($field21);

?> 