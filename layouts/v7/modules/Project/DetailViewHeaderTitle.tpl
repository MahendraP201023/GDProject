{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is:  vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}
<style>
    .progress .bar {
        width: 50px !important;
    }

    .progress .circle .title a {
        width: 60px !important;
        display: inline-block;
    }
</style>
{strip}
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="record-header clearfix">
            <div class="recordImage bgproject app-{$SELECTED_MENU_CATEGORY}">
                <div class="name"><span><strong> <i class="vicon-project"></i> </strong></span></div>
            </div>
            <div class="recordBasicInfo">
                <div class="info-row">
                    <h4>
                        <div class="recordLabel pushDown" title="{$RECORD->getName()}">
                            {foreach item=NAME_FIELD from=$MODULE_MODEL->getNameFields()}
                                {assign var=FIELD_MODEL value=$MODULE_MODEL->getField($NAME_FIELD)}
                                {if $FIELD_MODEL->getPermissions()}
                                    <span class="{$NAME_FIELD}">{$RECORD->get($NAME_FIELD)}</span>&nbsp;
                                {/if}
                            {/foreach}
                        </div>
                    </h4>
                </div>
                {include file="DetailViewHeaderFieldsView.tpl"|vtemplate_path:$MODULE}
                
                {*
                {assign var=RELATED_TO value=$RECORD->get('linktoaccountscontacts')}
                {assign var=CONTACT value=$RECORD->get('contactid')}
                <div class="info-row row ">
                {if !empty($RELATED_TO)}
                         <div class="col-lg-7 fieldLabel">
                        <span class="muted">
                            {$RECORD->getDisplayValue('linktoaccountscontacts')}
                        </span>
                         </div>
                    {elseif !empty($CONTACT)}
                        <div class="info-row row ">
                             <div class="col-lg-7 fieldLabel">
                            <span class="muted">
                                {$RECORD->getDisplayValue('contactid')}</span>
                             </div>
                        </div>       
                    {/if}
                </div>
                *}

                <div class="progress hide" style="margin: -54px -127px 0px 250px;">
                    <div class="circle {if $PTTASKSTATUS1 eq 'Completed'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $payment_received} {$payment_received} {else} Discussion and payment received {/if}">
                            <a href="index.php?module=ProjectTask&view=Detail&record={$PTTASK1}&app=PROJECT" target="_blank" style="margin: 0px 0px 0px -5px;">
                                {if $payment_received} {$payment_received} {else} Discussion and payment received {/if}
                            </a>
                        </span>
                    </div>

                    <span class="bar done"></span>
                    <div class="circle {if $PTTASKSTATUS2 eq 'Completed'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $implementation} {$implementation} {else} Implementation {/if}">
                            <a href="index.php?module=ProjectTask&view=Detail&record={$PTTASK2}&app=PROJECT" target="_blank" style="margin: 0px 0px 0px -5px;">
                                {if $implementation} {$implementation} {else} Implementation {/if}
                            </a>
                        </span>
                    </div>
                    <span class="bar done"></span>
                    <div class="circle {if $PTTASKSTATUS3 eq 'Completed'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $installation} {$installation} {else} Installation {/if}">
                            <a href="index.php?module=ProjectTask&view=Detail&record={$PTTASK3}&app=PROJECT" target="_blank" style="margin: 0px 0px 0px -5px;">
                                {if $installation} {$installation} {else} Installation {/if}
                            </a>
                        </span>
                    </div>
                    <span class="bar done"></span>
                    <div class="circle {if $PTTASKSTATUS4 eq 'Completed'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $site_verification} {$site_verification} {else} Site Verification {/if}">
                            <a href="index.php?module=ProjectTask&view=Detail&record={$PTTASK4}&app=PROJECT" target="_blank" style="margin: 0px 0px 0px -5px;">
                                {if $site_verification} {$site_verification} {else} Site Verification {/if}
                            </a>
                        </span>
                    </div>
                    <span class="bar done"></span>
                    <div class="circle {if $PTTASKSTATUS5 eq 'Completed'} active {/if}">
                        <span class="label">✓</span>
                        <span class="title" style="padding-top: 8px;" title="{if $closure} {$closure} {else} Closure {/if}">
                            <a href="index.php?module=ProjectTask&view=Detail&record={$PTTASK5}&app=PROJECT" target="_blank" style="margin: 0px 0px 0px -5px;">
                                {if $closure} {$closure} {else} Closure {/if}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/strip}