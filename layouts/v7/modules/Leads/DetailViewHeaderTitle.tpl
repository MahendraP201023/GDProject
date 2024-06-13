{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}
<style>
    .progress .bar {
        width: 60px !important;
    }
</style>

{strip}
    <div class="col-sm-6 col-lg-6 col-md-6">
        <div class="record-header clearfix">
            <div class="hidden-sm hidden-xs recordImage bgleads app-{$SELECTED_MENU_CATEGORY}">
                {assign var=IMAGE_DETAILS value=$RECORD->getImageDetails()}
                {foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
                    {if !empty($IMAGE_INFO.url)}
                        <img src="{$IMAGE_INFO.url}" alt="{$IMAGE_INFO.orgname}" title="{$IMAGE_INFO.orgname}" width="100%" height="100px" align="left"><br>
                    {else}
                        <img src="{vimage_path('summary_Leads.png')}" class="summaryImg"/>
                    {/if}
                {/foreach}
                {if empty($IMAGE_DETAILS)}
                    <div class="name"><span><strong>{$MODULE_MODEL->getModuleIcon()}</strong></span></div>
				{/if}
            </div>
            <div class="recordBasicInfo">
                <div class="info-row">
                    <h4>
                        <span class="recordLabel pushDown" title="{$RECORD->getDisplayValue('salutationtype')}&nbsp;{$RECORD->getName()}"> 
                            {if $RECORD->getDisplayValue('salutationtype')}
                                <span class="salutation">  {$RECORD->getDisplayValue('salutationtype')}</span>&nbsp;
                            {/if}
                            {assign var=COUNTER value=0}
                            {foreach item=NAME_FIELD from=$MODULE_MODEL->getNameFields()}
                                {assign var=FIELD_MODEL value=$MODULE_MODEL->getField($NAME_FIELD)}
                                {if $FIELD_MODEL->getPermissions()}
                                    <span class="{$NAME_FIELD}">{trim($RECORD->get($NAME_FIELD))}</span>
                                    {if $COUNTER eq 0 && ($RECORD->get($NAME_FIELD))}&nbsp;{assign var=COUNTER value=$COUNTER+1}{/if}
                                {/if}
                            {/foreach}
                        </span>
                    </h4>
                </div>
                {include file="DetailViewHeaderFieldsView.tpl"|vtemplate_path:$MODULE}
                {*
                <div class="info-row row">
                    {assign var=FIELD_MODEL value=$MODULE_MODEL->getField('email')}
                    <div class="col-lg-7 fieldLabel">
                        <span class="email" title="{vtranslate($FIELD_MODEL->get('label'),$MODULE)} : {$RECORD->get('email')}">
                            {$RECORD->getDisplayValue("email")}
                        </span>
                    </div>
                </div>
                <div class="info-row row">
                    {assign var=FIELD_MODEL value=$MODULE_MODEL->getField('phone')}
                    <div class="col-lg-7 fieldLabel">
                        <span class="phone" title="{vtranslate($FIELD_MODEL->get('label'),$MODULE)} : {$RECORD->get('phone')}">
                            {$RECORD->getDisplayValue("phone")}
                        </span>
                    </div>
                </div>
                *}
               <div class="info-row">
                  <i class="fa fa-map-marker"></i>&nbsp;
                  <a class="showMap" href="javascript:void(0);" onclick='Vtiger_Index_Js.showMap(this);' data-module='{$RECORD->getModule()->getName()}' data-record='{$RECORD->getId()}'>{vtranslate('LBL_SHOW_MAP', $MODULE_NAME)}</a>
               </div>

                <div class="progress " style="margin: -90px -100px 0px 200px;">
                    <div class="circle {if $follow1st eq '1'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $followup_1} {$followup_1} {else} 1st follow {/if}">
                            {if $followup_1} {$followup_1} {else} 1st follow {/if}
                        </span>
                    </div>

                    <span class="bar done"></span>
                    <div class="circle {if $follow2nd eq '1'} active {/if}">
                        <span class="label">✓</span>
                       <span class="title" style="padding-top: 8px;" title="{if $followup_2} {$followup_2} {else} 2nd follow {/if}">
                            {if $followup_2} {$followup_2} {else} 2nd follow {/if}
                        </span>
                    </div>

                    <span class="bar done"></span>
                    <div class="circle {if $inccaVisit eq '1'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $innca_visit} {$innca_visit} {else} Innca Visit {/if}">
                            {if $innca_visit} {$innca_visit} {else} Innca Visit {/if}
                        </span>
                    </div>

                    <span class="bar done"></span>
                    <div class="circle {if $follow3rd eq '1'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $followup_3} {$followup_3} {else} 3rd follow {/if}">
                            {if $followup_3} {$followup_3} {else} 3rd follow {/if}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

{/strip}
