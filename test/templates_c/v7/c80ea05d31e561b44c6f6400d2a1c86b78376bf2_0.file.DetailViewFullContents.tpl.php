<?php
/* Smarty version 3.1.39, created on 2024-04-22 04:52:40
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewFullContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6625ed182bd753_79924748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c80ea05d31e561b44c6f6400d2a1c86b78376bf2' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/DetailViewFullContents.tpl',
      1 => 1703927642,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6625ed182bd753_79924748 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="detailView" method="POST"><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('DetailViewBlockView.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('RECORD_STRUCTURE'=>$_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value,'MODULE_NAME'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value), 0, true);
?></form>
<?php }
}
