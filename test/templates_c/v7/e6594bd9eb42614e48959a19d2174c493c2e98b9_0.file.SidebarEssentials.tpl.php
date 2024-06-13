<?php
/* Smarty version 3.1.39, created on 2024-03-18 03:54:46
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/RecycleBin/partials/SidebarEssentials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f7bb062f40d8_87979036',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6594bd9eb42614e48959a19d2174c493c2e98b9' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/RecycleBin/partials/SidebarEssentials.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f7bb062f40d8_87979036 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar-menu sidebar-menu-full">
    <div class="module-filters" id="module-filters">
        <div class="sidebar-container lists-menu-container">
            <h5 class="sidebar-header"> <?php echo vtranslate('LBL_MODULES','Settings:$MODULE');?>
 </h5>
            <hr>
            <div>
                <input class="search-list" type="text" placeholder="Search for Modules">
            </div>
            <div class="list-menu-content">
                <div class="list-group">   
                    <ul class="lists-menu" style="list-style-type: none; padding-left: 0px;">
                        <?php if (count($_smarty_tpl->tpl_vars['MODULE_LIST']->value) > 0) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MODULE_LIST']->value, 'MODULEMODEL');
$_smarty_tpl->tpl_vars['MODULEMODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['MODULEMODEL']->value) {
$_smarty_tpl->tpl_vars['MODULEMODEL']->do_else = false;
?>
                                <li style="font-size:12px;" class='listViewFilter <?php if ($_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName() == $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value) {?>active<?php }?> '>
                                    <a class="filterName" href="index.php?module=RecycleBin&view=List&sourceModule=<?php echo $_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName();?>
" ><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName(),$_smarty_tpl->tpl_vars['MODULEMODEL']->value->getName());?>
</a>
                                </li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </ul>
                 </div>
                <div class="list-group hide noLists">
                    <h6 class="lists-header"><center> <?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate('LBL_MODULES','Settings:$MODULE');?>
 <?php echo vtranslate('LBL_FOUND');?>
 ... </center></h6>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
