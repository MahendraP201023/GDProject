<?php
/* Smarty version 3.1.39, created on 2024-03-20 10:29:54
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/chartReportHiddenContents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65fabaa2814c98_69748989',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '277c843b71e916c033dc950bece04ada838665ae' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Reports/chartReportHiddenContents.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fabaa2814c98_69748989 (Smarty_Internal_Template $_smarty_tpl) {
?><select id="groupbyfield_element">
    <option value=""><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE_FIELDS']->value, 'PRIMARY_MODULE', false, 'PRIMARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['PRIMARY_MODULE']->do_else = false;
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['PRIMARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?>
            <optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('FIELD_INFO', explode(':',$_smarty_tpl->tpl_vars['FIELD_KEY']->value));?>
                    <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'D' || $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'DT') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:Y"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_YEAR',$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:MY"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_MONTH',$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
</option>
                    <?php } elseif ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'I' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'N' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'NN') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['PRIMARY_MODULE_NAME']->value);?>
</option>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </optgroup>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE_FIELDS']->value, 'SECONDARY_MODULE', false, 'SECONDARY_MODULE_NAME');
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value => $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value) {
$_smarty_tpl->tpl_vars['SECONDARY_MODULE']->do_else = false;
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['SECONDARY_MODULE']->value, 'BLOCK', false, 'BLOCK_LABEL');
$_smarty_tpl->tpl_vars['BLOCK']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value => $_smarty_tpl->tpl_vars['BLOCK']->value) {
$_smarty_tpl->tpl_vars['BLOCK']->do_else = false;
?>
            <optgroup label='<?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
-<?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
'>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['BLOCK']->value, 'FIELD_LABEL', false, 'FIELD_KEY');
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_KEY']->value => $_smarty_tpl->tpl_vars['FIELD_LABEL']->value) {
$_smarty_tpl->tpl_vars['FIELD_LABEL']->do_else = false;
?>
                    <?php $_smarty_tpl->_assignInScope('FIELD_INFO', explode(':',$_smarty_tpl->tpl_vars['FIELD_KEY']->value));?>
                    <?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'D' || $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] == 'DT') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:Y"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_YEAR',$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
:MY"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 (<?php echo vtranslate('LBL_MONTH',$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
)</option>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
</option>
                    <?php } elseif ($_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'I' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'N' && $_smarty_tpl->tpl_vars['FIELD_INFO']->value[4] != 'NN') {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['FIELD_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_LABEL']->value,$_smarty_tpl->tpl_vars['SECONDARY_MODULE_NAME']->value);?>
</option>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </optgroup>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>

<select id="datafields_element">
    <option value='count(*)'><?php echo vtranslate('LBL_RECORD_COUNT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CALCULATION_FIELDS']->value, 'CALCULATION_FIELDS_MODULE', false, 'CALCULATION_FIELDS_MODULE_LABEL');
$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value => $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->value) {
$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->do_else = false;
?>
        <optgroup label="<?php echo vtranslate($_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value,$_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE_LABEL']->value);?>
">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['CALCULATION_FIELDS_MODULE']->value, 'CALCULATION_FIELD_TRANSLATED_LABEL', false, 'CALCULATION_FIELD_KEY');
$_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['CALCULATION_FIELD_KEY']->value => $_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->value) {
$_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['CALCULATION_FIELD_KEY']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CALCULATION_FIELD_TRANSLATED_LABEL']->value;?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </optgroup>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><?php }
}
