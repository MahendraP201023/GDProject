<?php
/* Smarty version 3.1.39, created on 2024-05-29 12:21:24
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Leads/DetailViewHeaderTitle.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66571dc4140326_23949824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf7e2bb5badae211e7d365e3d3e3221804ba1091' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Leads/DetailViewHeaderTitle.tpl',
      1 => 1712297950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66571dc4140326_23949824 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    .progress .bar {
        width: 60px !important;
    }
</style>

<div class="col-sm-6 col-lg-6 col-md-6"><div class="record-header clearfix"><div class="hidden-sm hidden-xs recordImage bgleads app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><?php $_smarty_tpl->_assignInScope('IMAGE_DETAILS', $_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value, 'IMAGE_INFO', false, 'ITER');
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ITER']->value => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value) {
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = false;
if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'])) {?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="100%" height="100px" align="left"><br><?php } else { ?><img src="<?php echo vimage_path('summary_Leads.png');?>
" class="summaryImg"/><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (empty($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)) {?><div class="name"><span><strong><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>
</strong></span></div><?php }?></div><div class="recordBasicInfo"><div class="info-row"><h4><span class="recordLabel pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype')) {?><span class="salutation"> <?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
</span>&nbsp;<?php }
$_smarty_tpl->_assignInScope('COUNTER', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(), 'NAME_FIELD');
$_smarty_tpl->tpl_vars['NAME_FIELD']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->value) {
$_smarty_tpl->tpl_vars['NAME_FIELD']->do_else = false;
$_smarty_tpl->_assignInScope('FIELD_MODEL', $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value));
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()) {?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo trim($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value));?>
</span><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value == 0 && ($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value))) {?>&nbsp;<?php $_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></span></h4></div><?php $_smarty_tpl->_subTemplateRender(vtemplate_path("DetailViewHeaderFieldsView.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?><div class="info-row"><i class="fa fa-map-marker"></i>&nbsp;<a class="showMap" href="javascript:void(0);" onclick='Vtiger_Index_Js.showMap(this);' data-module='<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getModule()->getName();?>
' data-record='<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
'><?php echo vtranslate('LBL_SHOW_MAP',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div><div class="progress " style="margin: -90px -100px 0px 200px;"><div class="circle <?php if ($_smarty_tpl->tpl_vars['follow1st']->value == '1') {?> active <?php }?>"><span class="label">✓</span><span class="title" style="padding-top: 8px;" title="<?php if ($_smarty_tpl->tpl_vars['followup_1']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_1']->value;?>
 <?php } else { ?> 1st follow <?php }?>"><?php if ($_smarty_tpl->tpl_vars['followup_1']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_1']->value;?>
 <?php } else { ?> 1st follow <?php }?></span></div><span class="bar done"></span><div class="circle <?php if ($_smarty_tpl->tpl_vars['follow2nd']->value == '1') {?> active <?php }?>"><span class="label">✓</span><span class="title" style="padding-top: 8px;" title="<?php if ($_smarty_tpl->tpl_vars['followup_2']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_2']->value;?>
 <?php } else { ?> 2nd follow <?php }?>"><?php if ($_smarty_tpl->tpl_vars['followup_2']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_2']->value;?>
 <?php } else { ?> 2nd follow <?php }?></span></div><span class="bar done"></span><div class="circle <?php if ($_smarty_tpl->tpl_vars['inccaVisit']->value == '1') {?> active <?php }?>"><span class="label">✓</span><span class="title" style="padding-top: 8px;" title="<?php if ($_smarty_tpl->tpl_vars['innca_visit']->value) {?> <?php echo $_smarty_tpl->tpl_vars['innca_visit']->value;?>
 <?php } else { ?> Innca Visit <?php }?>"><?php if ($_smarty_tpl->tpl_vars['innca_visit']->value) {?> <?php echo $_smarty_tpl->tpl_vars['innca_visit']->value;?>
 <?php } else { ?> Innca Visit <?php }?></span></div><span class="bar done"></span><div class="circle <?php if ($_smarty_tpl->tpl_vars['follow3rd']->value == '1') {?> active <?php }?>"><span class="label">✓</span><span class="title" style="padding-top: 8px;" title="<?php if ($_smarty_tpl->tpl_vars['followup_3']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_3']->value;?>
 <?php } else { ?> 3rd follow <?php }?>"><?php if ($_smarty_tpl->tpl_vars['followup_3']->value) {?> <?php echo $_smarty_tpl->tpl_vars['followup_3']->value;?>
 <?php } else { ?> 3rd follow <?php }?></span></div></div></div></div></div>
<?php }
}