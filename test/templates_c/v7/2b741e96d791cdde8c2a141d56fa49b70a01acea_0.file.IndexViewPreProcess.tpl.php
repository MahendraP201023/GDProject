<?php
/* Smarty version 3.1.39, created on 2024-03-20 05:26:39
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/EmailTemplates/IndexViewPreProcess.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65fa738f5d6985_45941854',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b741e96d791cdde8c2a141d56fa49b70a01acea' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/EmailTemplates/IndexViewPreProcess.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:modules/Vtiger/partials/Topbar.tpl' => 1,
    'file:modules/Settings/Vtiger/SidebarHeader.tpl' => 1,
    'file:modules/Settings/Vtiger/ModuleHeader.tpl' => 1,
  ),
),false)) {
function content_65fa738f5d6985_45941854 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-fluid app-nav">
    <div class="row">
        <?php $_smarty_tpl->_subTemplateRender("file:modules/Settings/Vtiger/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php $_smarty_tpl->_assignInScope('ACTIVE_BLOCK', array('block'=>'Templates','menu'=>$_smarty_tpl->tpl_vars['smary']->value['request']['module']));?>
        <?php $_smarty_tpl->_subTemplateRender("file:modules/Settings/Vtiger/ModuleHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
<?php }
}
