<?php
/* Smarty version 3.1.39, created on 2024-04-15 12:04:59
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_661d17ebd55726_22470078',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd76d1842988cb2a43993c240be5b622d560f4f4' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewHeader.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661d17ebd55726_22470078 (Smarty_Internal_Template $_smarty_tpl) {
?><div class=" detailview-header-block"><div class="detailview-header"><div class="row"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewHeaderTitle.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
$_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewActions.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div></div><?php }
}
