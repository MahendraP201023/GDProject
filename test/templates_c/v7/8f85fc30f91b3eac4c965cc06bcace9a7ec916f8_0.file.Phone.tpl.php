<?php
/* Smarty version 3.1.39, created on 2024-03-20 05:25:49
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/ServiceEngineer/uitypes/Phone.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65fa735d68af84_90392504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f85fc30f91b3eac4c965cc06bcace9a7ec916f8' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/ServiceEngineer/uitypes/Phone.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fa735d68af84_90392504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('SPECIAL_VALIDATOR', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator());
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
if ((!$_smarty_tpl->tpl_vars['FIELD_NAME']->value)) {
$_smarty_tpl->_assignInScope('FIELD_NAME', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName());
}?><input <?php if ($_smarty_tpl->tpl_vars['READONLYFIELD']->value == true) {?>disabled="disabled"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_editView_fieldName_<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
" type="text" class="inputElement" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_NAME']->value;?>
"value="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)) {?>data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }
if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"] == true) {?> data-rule-required="true" <?php }
if (count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])) {?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>/><div class="row"><div class="col-sm-12 col-md-12 col-lg-12"><span id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
_valid-msg" class="hide text-success">Phone Number is valid</span><span id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
_error-msg" class="hide text-danger">Invalid number</span></div></div>
<?php }
}