<?php
/* Smarty version 3.1.39, created on 2024-04-22 05:46:42
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/ModuleSummaryView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6625f9c2245f89_33942511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d37d1a2ec97ef52f72edc8436f0fd06c52bd3f0' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/ModuleSummaryView.tpl',
      1 => 1703224892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6625f9c2245f89_33942511 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="recordDetails">
    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['SUMMARY_RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
?>
</div><?php }
}
