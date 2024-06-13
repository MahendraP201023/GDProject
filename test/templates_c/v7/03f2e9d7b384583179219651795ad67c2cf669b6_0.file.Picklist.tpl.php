<?php
/* Smarty version 3.1.39, created on 2024-05-25 05:01:41
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Users/uitypes/Picklist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_665170b57d1df0_75998953',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03f2e9d7b384583179219651795ad67c2cf669b6' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Users/uitypes/Picklist.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_665170b57d1df0_75998953 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('PICKLIST_VALUES', $_smarty_tpl->tpl_vars['FIELD_INFO']->value['picklistvalues']);
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName() == 'defaulteventstatus') {
$_smarty_tpl->_assignInScope('EVENT_MODULE', Vtiger_Module_Model::getInstance('Events'));
$_smarty_tpl->_assignInScope('EVENTSTATUS_FIELD_MODEL', $_smarty_tpl->tpl_vars['EVENT_MODULE']->value->getField('eventstatus'));
$_smarty_tpl->_assignInScope('PICKLIST_VALUES', $_smarty_tpl->tpl_vars['EVENTSTATUS_FIELD_MODEL']->value->getPicklistValues());
} elseif ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName() == 'defaultactivitytype') {
$_smarty_tpl->_assignInScope('EVENT_MODULE', Vtiger_Module_Model::getInstance('Events'));
$_smarty_tpl->_assignInScope('ACTIVITYTYPE_FIELD_MODEL', $_smarty_tpl->tpl_vars['EVENT_MODULE']->value->getField('activitytype'));
$_smarty_tpl->_assignInScope('PICKLIST_VALUES', $_smarty_tpl->tpl_vars['ACTIVITYTYPE_FIELD_MODEL']->value->getPicklistValues());
}?><select data-fieldname="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" data-fieldtype="picklist" class="inputElement select2 <?php if ($_smarty_tpl->tpl_vars['OCCUPY_COMPLETE_WIDTH']->value) {?> row <?php }?>" type="picklist" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }?> data-selected-value='<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
'<?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"] == true) {?> data-rule-required="true" <?php }
if (php7_count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])) {?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEmptyPicklistOptionAllowed()) {?><option value=""><?php echo vtranslate('LBL_SELECT_OPTION','Vtiger');?>
</option><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PICKLIST_VALUES']->value, 'PICKLIST_VALUE', false, 'PICKLIST_NAME');
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_NAME']->value => $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value) {
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->do_else = false;
if ($_smarty_tpl->tpl_vars['PICKLIST_NAME']->value == ' ' && ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') == 'currency_decimal_separator' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') == 'currency_grouping_separator')) {
$_smarty_tpl->_assignInScope('PICKLIST_VALUE', vtranslate('Space',$_smarty_tpl->tpl_vars['MODULE']->value));
$_smarty_tpl->_assignInScope('OPTION_VALUE', '&nbsp;');
} else {
$_smarty_tpl->_assignInScope('OPTION_VALUE', Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKLIST_NAME']->value));
}?><option value="<?php echo $_smarty_tpl->tpl_vars['OPTION_VALUE']->value;?>
" <?php if (decode_html($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue')) == decode_html($_smarty_tpl->tpl_vars['PICKLIST_NAME']->value)) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value;?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php }
}