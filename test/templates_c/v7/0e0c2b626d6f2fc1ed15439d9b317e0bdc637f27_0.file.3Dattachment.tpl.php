<?php
/* Smarty version 3.1.39, created on 2024-03-14 11:59:08
  from '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Potentials/3Dattachment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_65f2e68c9da7a6_49986612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e0c2b626d6f2fc1ed15439d9b317e0bdc637f27' => 
    array (
      0 => '/home2/bitechnosys/incca.crm-doctor.com/layouts/v7/modules/Potentials/3Dattachment.tpl',
      1 => 1703140970,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f2e68c9da7a6_49986612 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="2Dattachment" class='modal-xs modal-dialog'>
    <div class = "modal-content">
        <?php ob_start();
echo vtranslate('3D Design Attachment',$_smarty_tpl->tpl_vars['MODULE']->value);
$_prefixVariable1=ob_get_clean();
$_smarty_tpl->_assignInScope('TITLE', $_prefixVariable1);?>
        <?php $_smarty_tpl->_subTemplateRender(vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0, true);
?>

        <form class="form-horizontal" id="massSave" method="post" action="index.php" enctype="multipart/form-data">
            <input type="hidden" name="module" value="Potentials" />
            <input type="hidden" name="view" value="DesignAttachment" />
            <input type="hidden" name="mode" value="save3DDesignAttachment" />
            <input type="hidden" name="recordId" value="<?php echo $_smarty_tpl->tpl_vars['recordId']->value;?>
" />
            
            <div class="modal-body">
                <div>
                    <span><strong><?php echo vtranslate('Select 3D Design Attachment',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></span>
                    &nbsp;:&nbsp;<br><br>
                    <div>
                        <input type="file" name="3DDesign" id="3DDesign">
                    </div>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <center>
                        <button class="btn btn-success" type="save3DDesign"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
                        <a class="cancelLink" type="reset" data-dismiss="modal"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                    </center>
                </div>
            </div>
        </form>
    </div>
</div>
<?php }
}
