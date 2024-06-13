<?php
/* Smarty version 3.1.39, created on 2024-04-22 04:52:42
  from '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Project/ShowChart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6625ed1a0c4bf0_91343257',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '560942d7a6e9d7a27a2fac6ba6087dd549664da7' => 
    array (
      0 => '/home2/bitechnosys/jd-grp.crm-doctor.com/layouts/v7/modules/Project/ShowChart.tpl',
      1 => 1702537022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6625ed1a0c4bf0_91343257 (Smarty_Internal_Template $_smarty_tpl) {
?><style><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TASK_STATUS_COLOR']->value, 'COLOR', false, 'STATUS');
$_smarty_tpl->tpl_vars['COLOR']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['STATUS']->value => $_smarty_tpl->tpl_vars['COLOR']->value) {
$_smarty_tpl->tpl_vars['COLOR']->do_else = false;
echo Project_Record_Model::getGanttStatusCss($_smarty_tpl->tpl_vars['STATUS']->value,$_smarty_tpl->tpl_vars['COLOR']->value);
echo Project_Record_Model::getGanttSvgStatusCss($_smarty_tpl->tpl_vars['STATUS']->value,$_smarty_tpl->tpl_vars['COLOR']->value);
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></style><?php if (!empty($_smarty_tpl->tpl_vars['PROJECT_TASKS']->value['tasks'])) {?><div class="pull-right" style="margin-right: 5px;"><span style="margin: 2px;"><button class="btn textual zoomOut" title="zoom out"><span class="teamworkIcon">)</span></button></span><span style="margin: 2px;"><button class="btn textual zoomIn" title="zoom in"><span class="teamworkIcon">(</span></button></span><span style="margin: 2px;"><a href="index.php?module=Project&view=ExportChart&record=<?php echo $_smarty_tpl->tpl_vars['PARENT_ID']->value;?>
" target="_blank" class="btn reportActions btn-default"><?php echo vtranslate('LBL_REPORT_PRINT','Reports');?>
</a></span></div><br /><br /><input id="projecttasks" type="hidden" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['PROJECT_TASKS']->value));?>
"><input id="originalprojecttasks" type="hidden" value="<?php echo Vtiger_Util_Helper::toSafeHTML(Zend_Json::encode($_smarty_tpl->tpl_vars['PROJECT_TASKS']->value));?>
"><input id="userDateFormat" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATE_FORMAT']->value;?>
"><div id="workSpace" style="padding:0px;border:1px solid #e5e5e5;position:relative;margin:0 5px"></div><div id="gantEditorTemplates" style="display:none;"><div class="__template__" type="TASKSEDITHEAD"><!--<table class="gdfTable" cellspacing="0" cellpadding="0"><thead><tr style='height:50px'><th class="gdfColHeader" style="width:35px;"></th><th class="gdfColHeader" style="width:50px;" ><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:80px;" data-name="name" data-text="<?php echo vtranslate('LBL_TASK_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php echo vtranslate('LBL_TASK_NAME',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:80px;" data-name="startdate" data-text="<?php echo vtranslate('LBL_START_DATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" ><?php echo vtranslate('LBL_START_DATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:80px;" data-name="enddate" data-text="<?php echo vtranslate('LBL_END_DATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" ><?php echo vtranslate('LBL_END_DATE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th class="gdfColHeader cursorPointer" style="width:80px;" data-name="duration" data-text="<?php echo vtranslate('LBL_DURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"><?php echo vtranslate('LBL_DURATION',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th></tr></thead></table>--></div><div class="__template__" type="TASKROW"><!--<tr taskId="(#=obj.id#)" class="taskEditRow" level="(#=level#)"><th class="gdfCell editTask" align="right" style="cursor:pointer;" data-recordid="(#=obj.recordid#)"><span class="taskRowIndex">(#=obj.getRow()+1#)</span> <span class="teamworkIcon" style="font-size:12px;" >e</span></th><td class="gdfCell noClip" align="center"><div class="taskStatus cvcColorSquare" status="(#=obj.status#)"></div></td><td class="gdfCell indentCell" style="padding-left:(#=obj.level*10#)px;"><div class="(#=obj.isParent()?'exp-controller expcoll exp':'exp-controller'#)" align="center"></div>(#=obj.name#)</td><td class="gdfCell" name="start"></td><td class="gdfCell" name="end"></td><td class="gdfCell" name="durationtext">(#=obj.duration#)</td></tr>--></div><div class="__template__" type="TASKEMPTYROW"><!--<tr class="taskEditRow emptyRow" ><th class="gdfCell" align="right"></th><td class="gdfCell noClip" align="center"></td><td class="gdfCell"></td><td class="gdfCell"></td><td class="gdfCell"></td><td class="gdfCell"></td></tr>--></div><div class="__template__" type="TASKBAR"><!--<div class="taskBox taskBoxDiv" taskId="(#=obj.id#)" ><div class="layout (#=obj.hasExternalDep?'extDep':''#)"><div class="taskStatus" status="(#=obj.status#)"></div><div class="taskProgress" style="width:(#=obj.progress>100?100:obj.progress#)%; background-color:(#=obj.progress>100?'red':'rgb(153,255,51);'#);"></div><div class="milestone (#=obj.startIsMilestone?'active':''#)" ></div><div class="taskLabel"></div><div class="milestone end (#=obj.endIsMilestone?'active':''#)" ></div></div></div>--></div><div class="__template__" type="CHANGE_STATUS"><!--<div class="taskStatusBox"><div class="taskStatus cvcColorSquare" status="STATUS_ACTIVE" title="active"></div><div class="taskStatus cvcColorSquare" status="STATUS_DONE" title="completed"></div><div class="taskStatus cvcColorSquare" status="STATUS_FAILED" title="failed"></div><div class="taskStatus cvcColorSquare" status="STATUS_SUSPENDED" title="suspended"></div><div class="taskStatus cvcColorSquare" status="STATUS_UNDEFINED" title="undefined"></div></div>--></div><div class="__template__" type="TASK_EDITOR"><!--<div class="ganttTaskEditor"><table width="100%"><tr><td><table cellpadding="5"><tr><td><label for="code">code/short name</label><br><input type="text" name="code" id="code" value="" class="formElements"></td></tr><tr><td><label for="name">name</label><br><input type="text" name="name" id="name" value="" size="35" class="formElements"></td></tr><tr></tr><td><label for="description">description</label><br><textarea rows="5" cols="30" id="description" name="description" class="formElements"></textarea></td></tr></table></td><td valign="top"><table cellpadding="5"><tr><td colspan="2"><label for="status">status</label><br><div id="status" class="taskStatus" status=""></div></td><tr><td colspan="2"><label for="progress">progress</label><br><input type="text" name="progress" id="progress" value="" size="3" class="formElements"></td></tr><tr><td><label for="start">start</label><br><input type="text" name="start" id="start" value="" class="date" size="10" class="formElements"><input type="checkbox" id="startIsMilestone"> </td><td rowspan="2" class="graph" style="padding-left:50px"><label for="duration">dur.</label><br><input type="text" name="duration" id="duration" value="" size="5" class="formElements"></td></tr><tr><td><label for="end">end</label><br><input type="text" name="end" id="end" value="" class="date" size="10" class="formElements"><input type="checkbox" id="endIsMilestone"></td></table></td></tr></table><h2>assignments</h2><table cellspacing="1" cellpadding="0" width="100%" id="assigsTable"><tr><th style="width:100px;">name</th><th style="width:70px;">role</th><th style="width:30px;">est.wklg.</th><th style="width:30px;" id="addAssig"><span class="teamworkIcon" style="cursor: pointer">+</span></th></tr></table><div style="text-align: right; padding-top: 20px"><button id="saveButton" class="button big">save</button></div></div>--></div><div class="__template__" type="ASSIGNMENT_ROW"><!--<tr taskId="(#=obj.task.id#)" assigId="(#=obj.assig.id#)" class="assigEditRow" ><td ><select name="resourceId" class="formElements" (#=obj.assig.id.indexOf("tmp_")==0?"":"disabled"#) ></select></td><td ><select type="select" name="roleId" class="formElements"></select></td><td ><input type="text" name="effort" value="(#=getMillisInHoursMinutes(obj.assig.effort)#)" size="5" class="formElements"></td><td align="center"><span class="teamworkIcon delAssig" style="cursor: pointer">d</span></td></tr>--></div><div class="__template__" type="RESOURCE_EDITOR"><!--<div class="resourceEditor" style="padding: 5px;"><h2>Project team</h2><table cellspacing="1" cellpadding="0" width="100%" id="resourcesTable"><tr><th style="width:100px;">name</th><th style="width:30px;" id="addResource"><span class="teamworkIcon" style="cursor: pointer">+</span></th></tr></table><div style="text-align: right; padding-top: 20px"><button id="resSaveButton" class="button big">save</button></div></div>--></div><div class="__template__" type="RESOURCE_ROW"><!--<tr resId="(#=obj.id#)" class="resRow" ><td ><input type="text" name="name" value="(#=obj.name#)" style="width:100%;" class="formElements"></td><td align="center"><span class="teamworkIcon delRes" style="cursor: pointer">d</span></td></tr>--></div></div><div class="row" style="margin-top: 10px; padding: 5px;"><div class="col-lg-4"><table class="table table-condensed table-striped table-bordered "><thead><tr><td></td><td><b><?php echo vtranslate('LBL_STATUS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></td></tr></thead><tbody><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['TASK_STATUS']->value, 'STATUS_NAME');
$_smarty_tpl->tpl_vars['STATUS_NAME']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['STATUS_NAME']->value) {
$_smarty_tpl->tpl_vars['STATUS_NAME']->do_else = false;
$_smarty_tpl->_assignInScope('STATUS_NAME', trim($_smarty_tpl->tpl_vars['STATUS_NAME']->value));?><tr><td><div class="row"><div class="col-lg-3"> &nbsp; </div><div class="col-lg-3"><div status="<?php echo Project_Record_Model::getGanttStatus($_smarty_tpl->tpl_vars['STATUS_NAME']->value);?>
" class="taskStatus cvcColorSquare"></div></div><?php if ($_smarty_tpl->tpl_vars['STATUS_FIELD_MODEL']->value->isEditable()) {?><div class="col-lg-3"><a onclick="javascript:Project_Detail_Js.showEditColorModel('index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=EditAjax&mode=editColor&status=<?php echo $_smarty_tpl->tpl_vars['STATUS_NAME']->value;?>
', this)" data-status="<?php echo $_smarty_tpl->tpl_vars['STATUS_NAME']->value;?>
" data-color="<?php echo $_smarty_tpl->tpl_vars['TASK_STATUS_COLOR']->value[$_smarty_tpl->tpl_vars['STATUS_NAME']->value];?>
"><i title="<?php echo vtranslate('LBL_EDIT_COLOR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="fa fa-pencil alignMiddle"></i></a>&nbsp;</div><?php }?></div></td><td><?php echo vtranslate($_smarty_tpl->tpl_vars['STATUS_NAME']->value,'ProjectTask');?>
</td></tr><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></tbody></table></div><div class="col-lg-8"><div style="position: relative;width:93%" class="row alert-info well"><span class="span alert-info"><span style="padding: 1%"><b><?php echo vtranslate('LBL_INFO',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</b></span><ul><li><?php echo vtranslate('LBL_GANTT_INFO1',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li><li><?php echo vtranslate('LBL_GANTT_INFO2',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li></ul></span></div></div></div><?php } else { ?><table class="emptyRecordsDiv"><tbody><tr><td><?php $_smarty_tpl->_assignInScope('PROJECT_TASK_MODEL', Vtiger_Module_Model::getInstance('ProjectTask'));
$_smarty_tpl->_assignInScope('IS_MODULE_EDITABLE', $_smarty_tpl->tpl_vars['PROJECT_TASK_MODEL']->value->isPermitted('CreateView'));
$_smarty_tpl->_assignInScope('SINGLE_MODULE', "SINGLE_ProjectTask");
echo vtranslate('LBL_NO');?>
 <?php echo vtranslate('ProjectTask','ProjectTask');?>
 <?php echo vtranslate('LBL_FOUND');?>
 <?php echo vtranslate('LBL_NO_DATE_VALUE_MSG','ProjectTask');?>
.<?php if ($_smarty_tpl->tpl_vars['IS_MODULE_EDITABLE']->value) {?> <a href="<?php echo $_smarty_tpl->tpl_vars['PROJECT_TASK_MODEL']->value->getCreateRecordUrl();?>
&projectid=<?php echo $_smarty_tpl->tpl_vars['PARENT_ID']->value;?>
"> <?php echo vtranslate('LBL_CREATE');?>
 </a><?php }?></td></tr></tbody></table><?php }
}
}
