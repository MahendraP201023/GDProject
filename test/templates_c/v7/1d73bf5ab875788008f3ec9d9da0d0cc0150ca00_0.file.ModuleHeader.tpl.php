<?php
/* Smarty version 3.1.39, created on 2024-04-09 06:08:36
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Settings/ExtensionStore/ModuleHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6614db64ea7523_25243474',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d73bf5ab875788008f3ec9d9da0d0cc0150ca00' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Settings/ExtensionStore/ModuleHeader.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6614db64ea7523_25243474 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop"><div class="module-action-content clearfix"><div class="col-lg-4 col-md-4"><h4 title="<?php echo strtoupper(vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value));?>
" class="module-title pull-left text-uppercase"> <?php echo strtoupper(vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value));?>
 </h4></div><div class="col-lg-8 col-md-8"><div class="navbar-right"><ul class="nav navbar-nav"><li><?php if (!($_smarty_tpl->tpl_vars['PASSWORD_STATUS']->value)) {?><button class="btn btn-default module-buttons" type="button" id="logintoMarketPlace"><div class="fa fa-sign-in" aria-hidden="true"></div>&nbsp;&nbsp;Login to marketplace</button><?php } else { ?><button class="btn btn-default module-buttons" type="button" id="<?php if (!empty($_smarty_tpl->tpl_vars['CUSTOMER_PROFILE']->value['CustomerCardId'])) {?>updateCardDetails<?php } else { ?>setUpCardDetails<?php }?>"><div class="fa fa-credit-card" aria-hidden="true"></div>&nbsp;&nbsp;<?php if (!empty($_smarty_tpl->tpl_vars['CUSTOMER_PROFILE']->value['CustomerCardId'])) {
echo vtranslate('LBL_UPDATE_CARD_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
} else {
echo vtranslate('LBL_SETUP_CARD_DETAILS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></button><?php }?></li></ul></div></div></div></div><?php }
}
