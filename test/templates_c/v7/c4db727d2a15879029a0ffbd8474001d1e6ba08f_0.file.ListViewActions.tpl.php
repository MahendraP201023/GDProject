<?php
/* Smarty version 3.1.39, created on 2024-03-19 12:12:16
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/ListViewActions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f98120de5d16_42378774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4db727d2a15879029a0ffbd8474001d1e6ba08f' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/ListViewActions.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f98120de5d16_42378774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('LISTVIEW_MASSACTIONS_1', array());?><div id="listview-actions" class="listview-actions-container"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS']->value, 'LIST_MASSACTION', false, NULL, 'massActions', array (
));
$_smarty_tpl->tpl_vars['LIST_MASSACTION']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value) {
$_smarty_tpl->tpl_vars['LIST_MASSACTION']->do_else = false;
if ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_EDIT') {
$_smarty_tpl->_assignInScope('editAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} elseif ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_DELETE') {
$_smarty_tpl->_assignInScope('deleteAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} elseif ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel() == 'LBL_ADD_COMMENT') {
$_smarty_tpl->_assignInScope('commentAction', $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value);
} else {
$_smarty_tpl->_assignInScope('a', array_push($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value,$_smarty_tpl->tpl_vars['LIST_MASSACTION']->value));
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?><div class = "row"><div class="col-md-3"><div class="btn-group listViewActionsContainer" role="group" aria-label="..."><?php if ($_smarty_tpl->tpl_vars['deleteAction']->value) {?><button type="button" class="btn btn-default" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_MOVE_REPORT"onclick='Reports_List_Js.massMove("index.php?module=Reports&view=MoveReports")' title="<?php echo vtranslate('LBL_MOVE_REPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="vicon-foldermove" style='font-size:13px;'></i></button><?php }
if ($_smarty_tpl->tpl_vars['deleteAction']->value) {?><button type="button" class="btn btn-default" id=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getLabel();
if (stripos($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),'javascript:') === 0) {?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),strlen("javascript:"));?>
'<?php } else { ?> href='<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getUrl();?>
' <?php }?> title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-trash"></i></button><?php }?></div></div><div class='col-md-6'><div class="hide messageContainer" style = "height:30px;"><center><a id="selectAllMsgDiv" href="#"><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;(<span id="totalRecordsCount" value=""></span>)</a></center></div><div class="hide messageContainer" style = "height:30px;"><center><a id="deSelectAllMsgDiv" href="#"><?php echo vtranslate('LBL_DESELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></div><div class="col-md-3"><?php $_smarty_tpl->_assignInScope('RECORD_COUNT', $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value);
$_smarty_tpl->_subTemplateRender(vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('SHOWPAGEJUMP'=>true), 0, true);
?></div></div><?php }
}
