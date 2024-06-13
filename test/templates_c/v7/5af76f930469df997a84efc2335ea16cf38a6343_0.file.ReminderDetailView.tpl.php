<?php
/* Smarty version 3.1.39, created on 2024-03-15 06:35:52
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/uitypes/ReminderDetailView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f3ec48401e22_77109911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5af76f930469df997a84efc2335ea16cf38a6343' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/uitypes/ReminderDetailView.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f3ec48401e22_77109911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('REMINDER_VALUES', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId()));
if ($_smarty_tpl->tpl_vars['REMINDER_VALUES']->value == '') {?>
    <?php echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['MODULE']->value);?>

<?php } else { ?>
    <?php echo $_smarty_tpl->tpl_vars['REMINDER_VALUES']->value;
echo vtranslate('LBL_BEFORE_EVENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>

<?php }
}
}
