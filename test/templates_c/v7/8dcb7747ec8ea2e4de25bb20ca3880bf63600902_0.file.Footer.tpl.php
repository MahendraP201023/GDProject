<?php
/* Smarty version 3.1.39, created on 2024-04-11 10:17:30
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/Footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6617b8ba2eeed2_15688105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dcb7747ec8ea2e4de25bb20ca3880bf63600902' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Vtiger/Footer.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6617b8ba2eeed2_15688105 (Smarty_Internal_Template $_smarty_tpl) {
?>
</div>
<div id='overlayPage'>
	<!-- arrow is added to point arrow to the clicked element (Ex:- TaskManagement), 
	any one can use this by adding "show" class to it -->
	<div class='arrow'></div>
	<div class='data'>
	</div>
</div>
<div id='helpPageOverlay'></div>
<div id="js_strings" class="hide noprint"><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['LANGUAGE_STRINGS']->value);?>
</div>
<div id="maxListFieldsSelectionSize" class="hide noprint"><?php echo $_smarty_tpl->tpl_vars['MAX_LISTFIELDS_SELECTION_SIZE']->value;?>
</div>
<div class="modal myModal fade"></div>
<?php $_smarty_tpl->_subTemplateRender(vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
</body>

</html>
<?php }
}