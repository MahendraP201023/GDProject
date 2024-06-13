<?php
/* Smarty version 3.1.39, created on 2024-03-18 03:54:46
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/RecycleBin/ListViewPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f7bb0623edc9_47774613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf57c26603cfecada01584d35a8a36488b43cb37' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/RecycleBin/ListViewPreProcess.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/Topbar.tpl' => 1,
    'file:modules/RecycleBin/partials/SidebarHeader.tpl' => 1,
    'file:modules/RecycleBin/partials/SidebarEssentials.tpl' => 1,
  ),
),false)) {
function content_65f7bb0623edc9_47774613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid app-nav">
    <div class="row">
        <?php $_smarty_tpl->_subTemplateRender("file:modules/RecycleBin/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
</div>
</nav>
     <div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-60' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class="data">
        </div>
        <div class="modal-dialog">
        </div>
    </div>
<div class="main-container main-container-<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
">
		<?php $_smarty_tpl->_assignInScope('LEFTPANELHIDE', $_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'));?>
        <div id="modnavigator" class="module-nav">
            <div class="hidden-xs hidden-sm mod-switcher-container">
            </div>
        </div>
        <div id="sidebar-essentials" class="sidebar-essentials <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> hide <?php }?>">
            <?php $_smarty_tpl->_subTemplateRender("file:modules/RecycleBin/partials/SidebarEssentials.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <div class="listViewPageDiv content-area <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value == '1') {?> full-width <?php }?>" id="listViewContent">
                
    
            
    
<?php }
}
