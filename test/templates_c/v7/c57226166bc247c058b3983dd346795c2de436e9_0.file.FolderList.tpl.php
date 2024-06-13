<?php
/* Smarty version 3.1.39, created on 2024-04-09 06:07:23
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/MailManager/FolderList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6614db1b4c7565_08764291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57226166bc247c058b3983dd346795c2de436e9' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/MailManager/FolderList.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6614db1b4c7565_08764291 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['FOLDERS']->value) {?>
    <?php $_smarty_tpl->_assignInScope('INBOX_ADDED', 0);?>
    <?php $_smarty_tpl->_assignInScope('TRASH_ADDED', 0);?>
    <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FOLDERS']->value, 'FOLDER');
$_smarty_tpl->tpl_vars['FOLDER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
$_smarty_tpl->tpl_vars['FOLDER']->do_else = false;
?>
            <?php if (stripos($_smarty_tpl->tpl_vars['FOLDER']->value->name(),'inbox') !== false && $_smarty_tpl->tpl_vars['INBOX_ADDED']->value == 0) {?>
                <?php $_smarty_tpl->_assignInScope('INBOX_ADDED', 1);?>
                <?php $_smarty_tpl->_assignInScope('INBOX_FOLDER', $_smarty_tpl->tpl_vars['FOLDER']->value->name());?>
                <li class="cursorPointer mm_folder mmMainFolder active" data-foldername="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
">
                    <i class="fa fa-inbox fontSize20px"></i>&nbsp;&nbsp;
                    <b><?php echo vtranslate('LBL_INBOX',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
                    <span class="pull-right mmUnreadCountBadge <?php if (!$_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount()) {?>hide<?php }?>">
                       <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount();?>
 
                    </span>
                </li>
                <li class="cursorPointer mm_folder mmMainFolder" data-foldername="vt_drafts">
                    <i class="fa fa-floppy-o fontSize20px"></i>&nbsp;&nbsp;
                    <b><?php echo vtranslate('LBL_Drafts',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
                </li>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FOLDERS']->value, 'FOLDER');
$_smarty_tpl->tpl_vars['FOLDER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
$_smarty_tpl->tpl_vars['FOLDER']->do_else = false;
?>
            <?php if ($_smarty_tpl->tpl_vars['FOLDER']->value->isSentFolder()) {?>
                <?php $_smarty_tpl->_assignInScope('SENT_FOLDER', $_smarty_tpl->tpl_vars['FOLDER']->value->name());?>
                <li class="cursorPointer mm_folder mmMainFolder" data-foldername="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
">
                    <i class="fa fa-paper-plane fontSize20px"></i>&nbsp;&nbsp;
                    <b><?php echo vtranslate('LBL_SENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
                    <span class="pull-right mmUnreadCountBadge <?php if (!$_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount()) {?>hide<?php }?>">
                       <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount();?>
 
                    </span>
                </li>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FOLDERS']->value, 'FOLDER');
$_smarty_tpl->tpl_vars['FOLDER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
$_smarty_tpl->tpl_vars['FOLDER']->do_else = false;
?>
            <?php if (stripos($_smarty_tpl->tpl_vars['FOLDER']->value->name(),'trash') !== false && $_smarty_tpl->tpl_vars['TRASH_ADDED']->value == 0) {?>
                <?php $_smarty_tpl->_assignInScope('TRASH_ADDED', 1);?>
                <?php $_smarty_tpl->_assignInScope('TRASH_FOLDER', $_smarty_tpl->tpl_vars['FOLDER']->value->name());?>
                <li class="cursorPointer mm_folder mmMainFolder" data-foldername="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
">
                    <i class="fa fa-trash-o fontSize20px"></i>&nbsp;&nbsp;
                    <b><?php echo vtranslate('LBL_TRASH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b>
                    <span class="pull-right mmUnreadCountBadge <?php if (!$_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount()) {?>hide<?php }?>">
                       <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount();?>
 
                    </span>
                </li>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <br>
        <span class="padding15px"><b><?php echo vtranslate('LBL_Folders',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></span>
        
        <?php $_smarty_tpl->_assignInScope('IGNORE_FOLDERS', array($_smarty_tpl->tpl_vars['INBOX_FOLDER']->value,$_smarty_tpl->tpl_vars['SENT_FOLDER']->value,$_smarty_tpl->tpl_vars['TRASH_FOLDER']->value));?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FOLDERS']->value, 'FOLDER');
$_smarty_tpl->tpl_vars['FOLDER']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FOLDER']->value) {
$_smarty_tpl->tpl_vars['FOLDER']->do_else = false;
?>
            <?php if (!in_array($_smarty_tpl->tpl_vars['FOLDER']->value->name(),$_smarty_tpl->tpl_vars['IGNORE_FOLDERS']->value)) {?>
            <li class="cursorPointer mm_folder mmOtherFolder" data-foldername="<?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
">
                <b><?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->name();?>
</b>
                <span class="pull-right mmUnreadCountBadge <?php if (!$_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount()) {?>hide<?php }?>">
                   <?php echo $_smarty_tpl->tpl_vars['FOLDER']->value->unreadCount();?>
 
                </span>
            </li>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
<?php }
}
}
