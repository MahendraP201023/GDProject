<?php
/* Smarty version 3.1.39, created on 2024-04-15 06:49:51
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Reports/dashboards/DashBoardWidget.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_661cce0f2aca27_54166112',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0956f7047443042ebd589588af32a8e2dab9b634' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Reports/dashboards/DashBoardWidget.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661cce0f2aca27_54166112 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="dashboardWidgetHeader">
    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div>
<div class="dashboardWidgetContent">
    <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</div>

<div class="widgeticons dashBoardWidgetFooter">
    <div class="footerIcons pull-right">
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("dashboards/DashboardFooterIcons.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
    </div>
</div><?php }
}
