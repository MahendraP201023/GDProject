<?php
/* Smarty version 3.1.39, created on 2024-04-22 04:53:49
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Users/PreferenceDetailViewHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6625ed5d866d92_91477728',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86e1c07baaa347a4cea254ac4dfd3808a26e4848' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Users/PreferenceDetailViewHeader.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6625ed5d866d92_91477728 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('MODULE_NAME', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'));?><input id="recordId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" /><div class="detailViewContainer"><div class="detailViewTitle" id="prefPageHeader"><div class="col-lg-12 col-sm-12 col-xs-12"><div class="col-xs-8"><?php $_smarty_tpl->_assignInScope('IMAGE_DETAILS', $_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value, 'IMAGE_INFO', false, 'ITER');
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ITER']->value => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value) {
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'])) {?><span class="logo col-xs-2"><img height="75px" width="75px" src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" data-image-id="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['id'];?>
"></span><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value[0]['id'] == null) {?><span class="logo col-xs-2"><i class="fa fa-user" style="font-size: 75px"></i></span><?php }?><span class="col-xs-9"><span id="myPrefHeading"><h3><?php echo vtranslate('LBL_MY_PREFERENCES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </h3></span><span><?php echo vtranslate('LBL_USERDETAIL_INFO',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
&nbsp;&nbsp;"<b><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
</b>"</span></span></div><div class="col-xs-4"><div class="row detailViewButtoncontainer"><div class="btn-group pull-right"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWPREFERENCE'], 'DETAIL_VIEW_BASIC_LINK');
$_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value) {
$_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->do_else = false;
?><button class="btn btn-default"<?php if ($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->isPageLoadLink()) {?>onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();?>
'"<?php } else { ?>onclick=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();
}?>><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</button><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (count($_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEW']) > 0) {?><button class="btn btn-default" data-toggle="dropdown" href="javascript:void(0);"><?php echo vtranslate('LBL_MORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<i class="caret"></i></button><ul class="dropdown-menu pull-right"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEW'], 'DETAIL_VIEW_LINK');
$_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value) {
$_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->do_else = false;
if ($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel() == "Delete") {
if ($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->isAdminUser() && $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->getId() != $_smarty_tpl->tpl_vars['RECORD']->value->getId()) {?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_detailView_moreAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel());?>
"><a href=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getUrl();?>
 ><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
} else { ?><li id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_detailView_moreAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel());?>
"><a href=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getUrl();?>
 ><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }?></div></div></div></div><div class="detailViewInfo userPreferences"><div class="details col-xs-12"><br><?php }
}