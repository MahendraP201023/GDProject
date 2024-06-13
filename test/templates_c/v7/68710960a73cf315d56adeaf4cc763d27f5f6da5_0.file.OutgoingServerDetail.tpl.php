<?php
/* Smarty version 3.1.39, created on 2024-03-27 07:46:50
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Settings/Vtiger/OutgoingServerDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6603ceea8a47d9_77891869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68710960a73cf315d56adeaf4cc763d27f5f6da5' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Settings/Vtiger/OutgoingServerDetail.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6603ceea8a47d9_77891869 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="detailViewContainer" id="OutgoingServerDetails"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="clearfix"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><h3 style="margin-top: 0px;"><?php echo vtranslate('LBL_OUTGOING_SERVER',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><div class="btn-group pull-right"><button class="btn btn-default editButton" data-url='<?php echo $_smarty_tpl->tpl_vars['MODEL']->value->getEditViewUrl();?>
' type="button" title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</button></div></div></div><div><?php $_smarty_tpl->_assignInScope('WIDTHTYPE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('rowheight'));?><div class="block"><div><h4><?php echo vtranslate('LBL_MAIL_SERVER_SMTP',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><hr><table class="table editview-table no-border"><tbody><tr><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldLabel"style="width:25%" ><label><?php echo vtranslate('LBL_SERVER_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue"><span><?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('server');?>
</span></td></tr><tr><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldLabel" ><label><?php echo vtranslate('LBL_USER_NAME',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue" ><span><?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('server_username');?>
</span></td></tr><tr><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldLabel"><label><?php echo vtranslate('LBL_PASSWORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" style="border-left: none;"><span class="password"><?php if ($_smarty_tpl->tpl_vars['MODEL']->value->get('server_password') != '') {?>******<?php }?>&nbsp;</span></td></tr><tr><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldLabel"><label><?php echo vtranslate('LBL_FROM_EMAIL',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue"><span><?php echo $_smarty_tpl->tpl_vars['MODEL']->value->get('from_email_field');?>
</span></td></tr><tr><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldLabel"><label><?php echo vtranslate('LBL_REQUIRES_AUTHENTICATION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
 fieldValue"><span><?php if ($_smarty_tpl->tpl_vars['MODEL']->value->isSmtpAuthEnabled()) {
echo vtranslate('LBL_YES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 <?php } else {
echo vtranslate('LBL_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);
}?></span></td></tr></tbody></table></div></div></div></div>
<?php }
}
