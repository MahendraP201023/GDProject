<?php
/* Smarty version 3.1.39, created on 2024-03-19 12:14:09
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/dashboards/AddNotePad.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f98191628e18_40641402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90c09369354fb8735f36ed838e96935900249634' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Vtiger/dashboards/AddNotePad.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f98191628e18_40641402 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <div id="addNotePadWidgetContainer" class='modal-dialog'><div class="modal-content"><?php ob_start();
echo vtranslate('LBL_ADD',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1 = ob_get_clean();
ob_start();
echo vtranslate('LBL_NOTEPAD',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('HEADER_TITLE', (($_prefixVariable1).(" ")).($_prefixVariable2));
$_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0, true);
?><form class="form-horizontal" method="POST"><div class="row" style="padding:10px;"><label class="fieldLabel col-lg-4"><label class="pull-right"><?php echo vtranslate('LBL_NOTEPAD_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<span class="redColor">*</span> </label></label><div class="fieldValue col-lg-6"><input type="text" name="notePadName" class="inputElement" data-rule-required="true" /></div></div><div class="row" style="padding:10px;"><label class="fieldLabel col-lg-4"><label class="pull-right"><?php echo vtranslate('LBL_NOTEPAD_CONTENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label></label><div class="fieldValue col-lg-6"><textarea type="text" name="notePadContent" style="min-height: 100px;resize: none;width:100%"></textarea></div></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></form></div></div><?php }
}
