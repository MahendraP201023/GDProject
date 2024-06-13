<?php
/* Smarty version 3.1.39, created on 2024-05-28 11:58:38
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/ServiceEngineer/partials/EditViewContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6655c6ee8e4f69_61004322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2a38a3b97b1c1807fb4c919509265f32f08e46c' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/ServiceEngineer/partials/EditViewContents.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6655c6ee8e4f69_61004322 (Smarty_Internal_Template $_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value)) {?><input type="hidden" name="picklistDependency" value='<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value);?>
' /><?php }?><div name='editContent' style="padding-top: 30px;"><?php if ($_smarty_tpl->tpl_vars['DUPLICATE_RECORDS']->value) {?><div class="fieldBlockContainer duplicationMessageContainer"><div class="duplicationMessageHeader"><b><?php echo vtranslate('LBL_DUPLICATES_DETECTED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></div><div><?php echo getDuplicatesPreventionMessage($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['DUPLICATE_RECORDS']->value);?>
</div></div><?php }
if ($_smarty_tpl->tpl_vars['SPECIAL_ERROR']->value) {?><div class="fieldBlockContainer duplicationMessageContainer"><div class="duplicationMessageHeader"><b>Error</b></div><div><?php echo $_smarty_tpl->tpl_vars['SPECIAL_ERROR']->value;?>
</div></div><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value, 'BLOCK_FIELDS', false, 'BLOCK_LABEL', 'blockIterator', array (
));
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) {
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->do_else = false;
if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value) > 0) {?><div class='fieldBlockContainer' data-block="<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value;?>
"><h4 class='fieldBlockHeader'><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><hr><div class="container"><div class="row"><?php $_smarty_tpl->_assignInScope('COUNTER', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value, 'FIELD_MODEL', false, 'FIELD_NAME', 'blockfields', array (
));
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
$_smarty_tpl->_assignInScope('isReferenceField', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType());
$_smarty_tpl->_assignInScope('FIELD_INFO', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo());
$_smarty_tpl->_assignInScope('refrenceList', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getReferenceList());
$_smarty_tpl->_assignInScope('refrenceListCount', count($_smarty_tpl->tpl_vars['refrenceList']->value));
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable() == true) {?><div style="padding:10px;" id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
hideOrShowId" class="col-sm-6 col-md-6 col-lg-6 parentTRDiv "><div class="row"><div class="col-sm-5 col-md-5 col-lg-5" style="color: #2c3b49;opacity: 0.8;font-size: 14px;"><?php if ($_smarty_tpl->tpl_vars['MASS_EDITION_MODE']->value) {?><input class="inputElement" id="include_in_mass_edit_<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" data-update-field="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
" type="checkbox">&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['isReferenceField']->value == "reference") {
if ($_smarty_tpl->tpl_vars['refrenceListCount']->value > 1) {
$_smarty_tpl->_assignInScope('DISPLAYID', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'));
$_smarty_tpl->_assignInScope('REFERENCED_MODULE_STRUCTURE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getReferenceModule($_smarty_tpl->tpl_vars['DISPLAYID']->value));
if (!empty($_smarty_tpl->tpl_vars['REFERENCED_MODULE_STRUCTURE']->value)) {
$_smarty_tpl->_assignInScope('REFERENCED_MODULE_NAME', $_smarty_tpl->tpl_vars['REFERENCED_MODULE_STRUCTURE']->value->get('name'));
}?><select style="width: 140px;" class="select2 referenceModulesList"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['refrenceList']->value, 'value', false, 'index');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?><option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value == $_smarty_tpl->tpl_vars['REFERENCED_MODULE_NAME']->value) {?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['value']->value);?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><?php } else {
echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);
}
} elseif ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "83") {
$_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('COUNTER'=>$_smarty_tpl->tpl_vars['COUNTER']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0, true);
if ($_smarty_tpl->tpl_vars['TAXCLASS_DETAILS']->value) {
$_smarty_tpl->_assignInScope('taxCount', count($_smarty_tpl->tpl_vars['TAXCLASS_DETAILS']->value)%2);
if ($_smarty_tpl->tpl_vars['taxCount']->value == 0) {
if ($_smarty_tpl->tpl_vars['COUNTER']->value == 2) {
$_smarty_tpl->_assignInScope('COUNTER', 1);
} else {
$_smarty_tpl->_assignInScope('COUNTER', 2);
}
}
}
} else {
if ($_smarty_tpl->tpl_vars['MODULE']->value == 'Documents' && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label') == 'File Name') {
$_smarty_tpl->_assignInScope('FILE_LOCATION_TYPE_FIELD', $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value['LBL_FILE_INFORMATION']['filelocationtype']);
if ($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value) {
if ($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value->get('fieldvalue') == 'E') {
echo vtranslate("LBL_FILE_URL",$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="redColor">*</span><?php } else {
echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);
}
} else {
echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);
}
} else {
echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);
}
}?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory() == true) {?> <span class="redColor">*</span> <?php }?></div><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != '83') {?><div class="col-sm-7 col-md-7 col-lg-7"><div id="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
hideOrShowInputId" <?php ob_start();
echo $_smarty_tpl->tpl_vars['MODULE']->value;
$_prefixVariable1 = ob_get_clean();
if (in_array($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype'),array('19','69')) || $_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'description' || (($_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'recurringtype' || $_smarty_tpl->tpl_vars['FIELD_NAME']->value == 'reminder_time') && in_array($_prefixVariable1,array('Events','Calendar')))) {?> class="fieldValueWidth80 "  colspan="3" <?php $_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);?> <?php } elseif ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '56') {?> class="checkBoxType " <?php } elseif ($_smarty_tpl->tpl_vars['isReferenceField']->value == 'reference' || $_smarty_tpl->tpl_vars['isReferenceField']->value == 'multireference') {?> class="p-t-8 " <?php } else { ?>class="" <?php }?>><?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('READONLYFIELD'=>$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isReadOnly()), 0, true);
?></div></div><?php }
}?></hr></div></div><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ((1 & $_smarty_tpl->tpl_vars['COUNTER']->value)) {?><div class="col-sm-6 col-md-6 col-lg-6"></div><div class="col-sm-6 col-md-6 col-lg-6"></div><?php }?></div></div></div><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><?php echo '<script'; ?>
 type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Users/resources/intlTelInput.js');?>
"><?php echo '</script'; ?>
>
<?php }
}
