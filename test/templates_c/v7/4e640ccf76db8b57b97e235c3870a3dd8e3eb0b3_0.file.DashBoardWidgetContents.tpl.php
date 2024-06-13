<?php
/* Smarty version 3.1.39, created on 2024-04-15 06:49:51
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Reports/dashboards/DashBoardWidgetContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_661cce0f2d2a08_30331171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e640ccf76db8b57b97e235c3870a3dd8e3eb0b3' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Reports/dashboards/DashBoardWidgetContents.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661cce0f2d2a08_30331171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('CHART_DATA', ZEND_JSON::decode($_smarty_tpl->tpl_vars['DATA']->value));?>
<input class="yAxisFieldType" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['YAXIS_FIELD_TYPE']->value;?>
" />
<?php $_smarty_tpl->_assignInScope('CHART_VALUES', $_smarty_tpl->tpl_vars['CHART_DATA']->value['values']);
if (!empty($_smarty_tpl->tpl_vars['CHART_VALUES']->value)) {?>
    <input type='hidden' name='charttype' value="<?php echo $_smarty_tpl->tpl_vars['CHART_TYPE']->value;?>
" />
    <input type='hidden' class="widgetData" name='data' value='<?php echo $_smarty_tpl->tpl_vars['DATA']->value;?>
' /> 
    <input type='hidden' name='clickthrough' value="<?php echo $_smarty_tpl->tpl_vars['CLICK_THROUGH']->value;?>
" />
    <div style="margin:0px 10px;">
        <div>
            <div name='chartcontent' class="widgetChartContainer" style="height:245px;min-width:300px; margin: 0 auto">
            <br>
            </div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['CHART_TYPE']->value == 'pieChart') {?>
            <?php $_smarty_tpl->_assignInScope('CLASS_NAME', 'Report_Piechart_Js');?>
        <?php } elseif ($_smarty_tpl->tpl_vars['CHART_TYPE']->value == 'verticalbarChart') {?>
            <?php $_smarty_tpl->_assignInScope('CLASS_NAME', 'Report_Verticalbarchart_Js');?>
        <?php } elseif ($_smarty_tpl->tpl_vars['CHART_TYPE']->value == 'horizontalbarChart') {?>
            <?php $_smarty_tpl->_assignInScope('CLASS_NAME', 'Report_Horizontalbarchart_Js');?>
        <?php } else { ?>
            <?php $_smarty_tpl->_assignInScope('CLASS_NAME', 'Report_Linechart_Js');?>
        <?php }?>
        <?php echo '<script'; ?>
 type="text/javascript">
            <?php echo $_smarty_tpl->tpl_vars['CLASS_NAME']->value;?>
('Vtiger_ChartReportWidget_<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['WIDGET_ID']->value;?>
_Widget_Js',{},{ 
                init : function() {
                        this._super(jQuery("#<?php echo $_smarty_tpl->tpl_vars['RECORD_ID']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['WIDGET_ID']->value;?>
"));
                    }
            }); 
        <?php echo '</script'; ?>
>
        <div class="noClickThroughMsg">
            <?php if ($_smarty_tpl->tpl_vars['CLICK_THROUGH']->value != 'true') {?>
                <div class='row' style="padding:1px">
                    <span class='col-lg-2 offset3'> &nbsp;</span>
                    <span class='span alert-info'>
                        <i class="icon-info-sign"></i>
                        <?php echo vtranslate('LBL_CLICK_THROUGH_NOT_AVAILABLE',$_smarty_tpl->tpl_vars['MODULE']->value);?>

                    </span>
                </div>
                <br><br>
            <?php }?>
        </div>
    </div>
<?php } else { ?>
	<span class="noDataMsg" style="position: relative; top: 115.5px; left: 119px;">
		<?php echo vtranslate('LBL_NO');?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_MATCHED_THIS_CRITERIA');?>

	</span>
<?php }
}
}
