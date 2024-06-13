<?php
/* Smarty version 3.1.39, created on 2024-01-12 11:03:44
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/PicklistColorMap.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65a11c90632fd3_09320496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4059bc46a122f4cf370a2d170ca6f8b365c5cfc8' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/PicklistColorMap.tpl',
      1 => 1702495622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a11c90632fd3_09320496 (Smarty_Internal_Template $_smarty_tpl) {
?>
<style type="text/css">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'picklist' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType() == 'multipicklist') {?>
            <?php $_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('_name'));?>
            <?php if ($_smarty_tpl->tpl_vars['FIELD_NAME']->value == '') {?>
                <?php $_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName());?>
            <?php }?>
            <?php $_smarty_tpl->_assignInScope('PICKLIST_COLOR_MAP', Settings_Picklist_Module_Model::getPicklistColorMap($_smarty_tpl->tpl_vars['FIELD_NAME']->value,true));?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PICKLIST_COLOR_MAP']->value, 'PICKLIST_COLOR', false, 'PICKLIST_VALUE');
$_smarty_tpl->tpl_vars['PICKLIST_COLOR']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value => $_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value) {
$_smarty_tpl->tpl_vars['PICKLIST_COLOR']->do_else = false;
?>
                <?php $_smarty_tpl->_assignInScope('PICKLIST_TEXT_COLOR', decode_html(Settings_Picklist_Module_Model::getTextColor($_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value)));?>
                <?php $_smarty_tpl->_assignInScope('CONVERTED_PICKLIST_VALUE', Vtiger_Util_Helper::convertSpaceToHyphen($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value));?>
                    .picklist-<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getId();?>
-<?php echo Vtiger_Util_Helper::escapeCssSpecialCharacters($_smarty_tpl->tpl_vars['CONVERTED_PICKLIST_VALUE']->value);?>
 {
                        background-color: <?php echo $_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value;?>
;
                        color: <?php echo $_smarty_tpl->tpl_vars['PICKLIST_TEXT_COLOR']->value;?>
; 
                    }
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if (($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Calendar' && $_smarty_tpl->tpl_vars['MODULE_MODEL']->value) || ($_smarty_tpl->tpl_vars['RELATED_MODULE_NAME']->value == 'Calendar' && $_smarty_tpl->tpl_vars['RELATED_MODULE']->value) || ($_smarty_tpl->tpl_vars['SOURCE_MODULE']->value == 'Calendar')) {?>
		<?php $_smarty_tpl->_assignInScope('STATUS_FIELD', Vtiger_Field_Model::getInstance('eventstatus',Vtiger_Module_Model::getInstance('Events')));?>

        <?php if ($_smarty_tpl->tpl_vars['STATUS_FIELD']->value) {?>
            <?php $_smarty_tpl->_assignInScope('PICKLIST_COLOR_MAP', Settings_Picklist_Module_Model::getPicklistColorMap('eventstatus',true));?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PICKLIST_COLOR_MAP']->value, 'PICKLIST_COLOR', false, 'PICKLIST_VALUE');
$_smarty_tpl->tpl_vars['PICKLIST_COLOR']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value => $_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value) {
$_smarty_tpl->tpl_vars['PICKLIST_COLOR']->do_else = false;
?>
                <?php $_smarty_tpl->_assignInScope('PICKLIST_TEXT_COLOR', Settings_Picklist_Module_Model::getTextColor($_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value));?>
                <?php $_smarty_tpl->_assignInScope('CONVERTED_PICKLIST_VALUE', Vtiger_Util_Helper::convertSpaceToHyphen($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value));?>
                    .picklist-<?php echo $_smarty_tpl->tpl_vars['STATUS_FIELD']->value->getId();?>
-<?php echo Vtiger_Util_Helper::escapeCssSpecialCharacters($_smarty_tpl->tpl_vars['CONVERTED_PICKLIST_VALUE']->value);?>
 {
                        background-color: <?php echo $_smarty_tpl->tpl_vars['PICKLIST_COLOR']->value;?>
;color: <?php echo $_smarty_tpl->tpl_vars['PICKLIST_TEXT_COLOR']->value;?>
;
                    }
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
    <?php }?>
</style>
<?php }
}