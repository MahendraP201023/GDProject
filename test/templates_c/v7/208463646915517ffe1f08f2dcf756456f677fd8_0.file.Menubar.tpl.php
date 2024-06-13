<?php
/* Smarty version 3.1.39, created on 2024-05-22 07:58:20
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Documents/partials/Menubar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_664da59c0a8019_47104101',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '208463646915517ffe1f08f2dcf756456f677fd8' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Documents/partials/Menubar.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664da59c0a8019_47104101 (Smarty_Internal_Template $_smarty_tpl) {
if ($_REQUEST['view'] == 'Detail') {?>
<div id="modules-menu" class="modules-menu">    
    <ul>
        <li class="active">
            <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
">
				<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>

                <span><?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
</span>
            </a>
        </li>
    </ul>
</div>
<?php }
}
}
