<?php
/* Smarty version 3.1.39, created on 2024-03-20 10:29:33
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/EditChartHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65faba8dd05878_31132217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb69f5c09d3dcc0bdb2cab67b1cc99c8d14ad777' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/EditChartHeader.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65faba8dd05878_31132217 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="editContainer" style="padding-left: 2%;padding-right: 2%"><div class="row"><?php $_smarty_tpl->_assignInScope('LABELS', array("step1"=>"LBL_REPORT_DETAILS","step2"=>"LBL_FILTERS","step3"=>"LBL_SELECT_CHART"));
$_smarty_tpl->_subTemplateRender(vtemplate_path("BreadCrumbs.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ACTIVESTEP'=>1,'BREADCRUMB_LABELS'=>$_smarty_tpl->tpl_vars['LABELS']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0, true);
?></div><div class="clearfix"></div><?php }
}
