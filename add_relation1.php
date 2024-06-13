<?php
/*
create_relation.php
Create this file into your root directory of vtiger i.e. vtigercrm/
and then run this file directly using your browser 
for example localhost/vtigercrm/create_relation.php
*/
include_once('vtlib/Vtiger/Module.php');
$moduleInstance = Vtiger_Module::getInstance('Project');
$accountsModule = Vtiger_Module::getInstance('Measurement');
$relationLabel  = 'Measurement';
$moduleInstance->setRelatedList(
      $accountsModule, $relationLabel,array('ADD'),'get_dependents_list'
);

echo "done";