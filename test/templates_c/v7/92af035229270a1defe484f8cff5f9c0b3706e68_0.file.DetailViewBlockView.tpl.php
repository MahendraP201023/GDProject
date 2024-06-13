<?php
/* Smarty version 3.1.39, created on 2024-05-26 11:17:11
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/ServiceEngineer/DetailViewBlockView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_66531a3790b054_34511276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92af035229270a1defe484f8cff5f9c0b3706e68' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/ServiceEngineer/DetailViewBlockView.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66531a3790b054_34511276 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
function openInNewTab(url) {
 window.open(url, '_blank').focus();
}
$("#employeeDetailsEditSingle").text("Edit");
$("#employeeDetailsEditSingle").click(function(){
	if($(this).text()=="Edit"){
		$(this).text("Cancel Edit");
		let action=$(".action");
		for(let i=0;i<action.length;i++){
			$(action[i]).show();
		}
	}else{
		$(this).text("Edit");
		let action=$(".action");
		for(let i=0;i<action.length;i++){
			$(action[i]).hide();
		}	
	}
	
})
<?php echo '</script'; ?>
>
<?php if (!empty($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value)) {?><input type="hidden" name="picklistDependency" value='<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value);?>
' /><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value, 'FIELD_MODEL_LIST', false, 'BLOCK_LABEL_KEY');
$_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->do_else = false;
$_smarty_tpl->_assignInScope('BLOCK', $_smarty_tpl->tpl_vars['BLOCK_LIST']->value[$_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value]);
if ($_smarty_tpl->tpl_vars['BLOCK']->value == null || count($_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value) <= 0 || $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value == 'LBL_PRICING_INFORMATION') {
continue 1;
}?><div class="block block_<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value;?>
" data-block="<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value;?>
" data-blockid="<?php echo $_smarty_tpl->tpl_vars['BLOCK_LIST']->value[$_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value]->get('id');?>
"><?php $_smarty_tpl->_assignInScope('IS_HIDDEN', $_smarty_tpl->tpl_vars['BLOCK']->value->isHidden());
$_smarty_tpl->_assignInScope('WIDTHTYPE', $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'));?><input type=hidden name="timeFormatOptions" data-value='<?php echo $_smarty_tpl->tpl_vars['DAY_STARTS']->value;?>
' /><div><h4 class="textOverflowEllipsis maxWidth50"><img class="cursorPointer alignMiddle blockToggle <?php if (!($_smarty_tpl->tpl_vars['IS_HIDDEN']->value)) {?> hide <?php }?>" src="<?php echo vimage_path('arrowRight.png');?>
" data-mode="hide" data-id=<?php echo $_smarty_tpl->tpl_vars['BLOCK_LIST']->value[$_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value]->get('id');?>
><img class="cursorPointer alignMiddle blockToggle <?php if (($_smarty_tpl->tpl_vars['IS_HIDDEN']->value)) {?> hide <?php }?>" src="<?php echo vimage_path('arrowdown.png');?>
" data-mode="show" data-id=<?php echo $_smarty_tpl->tpl_vars['BLOCK_LIST']->value[$_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value]->get('id');?>
>&nbsp;<?php ob_start();
echo $_smarty_tpl->tpl_vars['BLOCK_LABEL_KEY']->value;
$_prefixVariable4 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable5 = ob_get_clean();
echo vtranslate($_prefixVariable4,$_prefixVariable5);?>
</h4></div><hr><div class="blockData"><table class="table detailview-table no-border"><tbody <?php if ($_smarty_tpl->tpl_vars['IS_HIDDEN']->value) {?> class="hide" <?php }?>><?php $_smarty_tpl->_assignInScope('COUNTER', 0);?><tr><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value, 'FIELD_MODEL', false, 'FIELD_NAME');
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_NAME']->value => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_MODEL']->do_else = false;
$_smarty_tpl->_assignInScope('fieldDataType', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType());
if (!$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isViewableInDetailView()) {
continue 1;
}
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "83") {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TAXCLASS_DETAILS']->value, 'tax', false, 'count');
$_smarty_tpl->tpl_vars['tax']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['count']->value => $_smarty_tpl->tpl_vars['tax']->value) {
$_smarty_tpl->tpl_vars['tax']->do_else = false;
if ($_smarty_tpl->tpl_vars['COUNTER']->value == 2) {?></tr><tr><?php $_smarty_tpl->_assignInScope('COUNTER', 1);
} else {
$_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);
}?><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><span class='muted'><?php echo vtranslate($_smarty_tpl->tpl_vars['tax']->value['taxlabel'],$_smarty_tpl->tpl_vars['MODULE']->value);?>
(%)</span></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><span class="value textOverflowEllipsis" data-field-type="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType();?>
" ><?php if ($_smarty_tpl->tpl_vars['tax']->value['check_value'] == 1) {
echo $_smarty_tpl->tpl_vars['tax']->value['percentage'];
} else { ?>0<?php }?></span></td><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "69" || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "105") {
if ($_smarty_tpl->tpl_vars['COUNTER']->value != 0) {
if ($_smarty_tpl->tpl_vars['COUNTER']->value == 2) {?></tr><tr><?php $_smarty_tpl->_assignInScope('COUNTER', 0);
}
}?><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><span class="muted"><?php ob_start();
echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label');
$_prefixVariable6 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable7 = ob_get_clean();
echo vtranslate($_prefixVariable6,$_prefixVariable7);?>
</span></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><ul id="imageContainer" class="imageSlider"><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'HelpDesk' || $_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'ServiceReports') {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value, 'IMAGE_INFO', false, 'ITER');
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ITER']->value => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value) {
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = false;
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName() == $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['fieldNameFromDB']) {
ob_start();
echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];
$_prefixVariable8 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url']) && !empty($_prefixVariable8)) {
if ((strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.png') >= 1 || strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.jpeg') >= 1 || strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.jpg') >= 1)) {?><li><span><a onclick="openInNewTab('<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['location'];?>
');"><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
</a></span></li><?php } else { ?><li><img style="display:none" data-image-id="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['id'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
"/><span><a onclick="openInNewTab('<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['location'];?>
');"><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
</a></span></li><?php }
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} else {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value, 'IMAGE_INFO', false, 'ITER');
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ITER']->value => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value) {
$_smarty_tpl->tpl_vars['IMAGE_INFO']->do_else = false;
ob_start();
echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];
$_prefixVariable9 = ob_get_clean();
if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url']) && !empty($_prefixVariable9)) {
if ((strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.png') >= 1 || strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.jpeg') >= 1 || strpos($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'],'.jpg') >= 1)) {?><li><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="400" height="300" /><span><a href="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
</a></span></li><?php } else { ?><li><img style="display:none" data-image-id="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['id'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
"/><span><a href="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['name'];?>
</a></span></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?></ul></td><?php $_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);
} else {
if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "20" || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == "19" || $_smarty_tpl->tpl_vars['fieldDataType']->value == 'reminder' || $_smarty_tpl->tpl_vars['fieldDataType']->value == 'recurrence') {
if ($_smarty_tpl->tpl_vars['COUNTER']->value == '1') {?><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td></tr><tr><?php $_smarty_tpl->_assignInScope('COUNTER', 0);
}
}
if ($_smarty_tpl->tpl_vars['COUNTER']->value == 2) {?></tr><tr><?php $_smarty_tpl->_assignInScope('COUNTER', 1);
} else {
$_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);
}?><td class="fieldLabel textOverflowEllipsis <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_fieldLabel_<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName() == 'description' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '69') {?> style='width:8%'<?php }?>><span class="muted"><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value == 'Documents' && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label') == "File Name" && $_smarty_tpl->tpl_vars['RECORD']->value->get('filelocationtype') == 'E') {
ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable10 = ob_get_clean();
echo vtranslate("LBL_FILE_URL",$_prefixVariable10);
} else {
ob_start();
echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label');
$_prefixVariable11 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;
$_prefixVariable12 = ob_get_clean();
echo vtranslate($_prefixVariable11,$_prefixVariable12);
}
if (($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '72') && ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName() == 'unit_price')) {?>(<?php echo $_smarty_tpl->tpl_vars['BASE_CURRENCY_SYMBOL']->value;?>
)<?php }?></span></td><td class="fieldValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_fieldValue_<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '19' || $_smarty_tpl->tpl_vars['fieldDataType']->value == 'reminder' || $_smarty_tpl->tpl_vars['fieldDataType']->value == 'recurrence') {?> colspan="3" <?php $_smarty_tpl->_assignInScope('COUNTER', $_smarty_tpl->tpl_vars['COUNTER']->value+1);?> <?php }?>><?php $_smarty_tpl->_assignInScope('FIELD_VALUE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'));
if ($_smarty_tpl->tpl_vars['fieldDataType']->value == 'multipicklist') {
$_smarty_tpl->_assignInScope('FIELD_DISPLAY_VALUE', $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue')));
} else {
$_smarty_tpl->_assignInScope('FIELD_DISPLAY_VALUE', Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'))));
}?><span class="value" data-field-type="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '19' || $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') == '21') {?> style="white-space:normal;" <?php }?>><?php $_smarty_tpl->_subTemplateRender(vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getDetailViewTemplateName(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('FIELD_MODEL'=>$_smarty_tpl->tpl_vars['FIELD_MODEL']->value,'USER_MODEL'=>$_smarty_tpl->tpl_vars['USER_MODEL']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE_NAME']->value,'RECORD'=>$_smarty_tpl->tpl_vars['RECORD']->value), 0, true);
?></span><?php if ($_smarty_tpl->tpl_vars['IS_AJAX_ENABLED']->value && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable() == 'true' && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isAjaxEditable() == 'true') {?><span class="hide edit pull-left"><?php if ($_smarty_tpl->tpl_vars['fieldDataType']->value == 'multipicklist') {?><input type="hidden" class="fieldBasicData" data-name='<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
[]' data-type="<?php echo $_smarty_tpl->tpl_vars['fieldDataType']->value;?>
" data-displayvalue='<?php echo $_smarty_tpl->tpl_vars['FIELD_DISPLAY_VALUE']->value;?>
' data-value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php } else { ?><input type="hidden" class="fieldBasicData" data-name='<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
' data-type="<?php echo $_smarty_tpl->tpl_vars['fieldDataType']->value;?>
" data-displayvalue='<?php echo $_smarty_tpl->tpl_vars['FIELD_DISPLAY_VALUE']->value;?>
' data-value="<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
" /><?php }?></span><span class="action pull-right" style="display :none"><a href="#" onclick="return false;" class="editAction fa fa-pencil"></a></span><?php }?></td><?php }
if (count($_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value) == 1 && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != "19" && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != "20" && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != "30" && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name') != "recurringtype" && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != "69" && $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype') != "105") {?><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td><?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (end($_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value) == true && count($_smarty_tpl->tpl_vars['FIELD_MODEL_LIST']->value) != 1 && $_smarty_tpl->tpl_vars['COUNTER']->value == 1) {?><td class="fieldLabel <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"></td><?php }?></tr></tbody></table></div></div><br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
