<?php


//This is the access privilege file
$is_admin=false;

$current_user_roles='H9';

$current_user_parent_role_seq='H1::H2::H8::H9';

$current_user_profiles=array(8,);

$profileGlobalPermission=array('1'=>1,'2'=>1,);

$profileTabsPermission=array('1'=>0,'2'=>0,'4'=>1,'6'=>1,'7'=>1,'8'=>1,'9'=>1,'10'=>1,'14'=>1,'16'=>1,'18'=>1,'19'=>1,'20'=>1,'21'=>1,'22'=>1,'23'=>1,'25'=>1,'26'=>1,'31'=>1,'35'=>1,'36'=>1,'38'=>1,'40'=>1,'42'=>1,'43'=>1,'44'=>1,'45'=>1,'46'=>1,'47'=>1,'48'=>1,'50'=>1,'51'=>1,'52'=>1,'56'=>1,'57'=>1,'58'=>1,'59'=>1,'60'=>1,'61'=>0,'62'=>0,'63'=>0,'64'=>0,'65'=>0,'28'=>1,'3'=>0,);

$profileActionPermission=array(2=>array(0=>1,1=>1,2=>1,4=>0,7=>1,5=>0,6=>0,10=>0,),4=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),6=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),7=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,9=>0,10=>0,),8=>array(0=>1,1=>1,2=>1,4=>1,7=>1,6=>0,),9=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),10=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),14=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),16=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),18=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),19=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),20=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),21=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),22=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),23=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),25=>array(0=>1,1=>0,2=>0,4=>0,7=>0,6=>1,13=>1,),26=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),35=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),36=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),38=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),42=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),43=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),44=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),45=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,10=>0,),47=>array(0=>0,1=>0,2=>0,4=>0,7=>0,),50=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,),56=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),57=>array(0=>1,1=>1,2=>1,4=>1,7=>1,5=>0,6=>0,8=>0,10=>0,),61=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>0,),62=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>1,6=>1,8=>1,),63=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>1,),64=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,5=>0,6=>0,8=>1,),65=>array(0=>0,1=>0,2=>0,3=>0,4=>0,7=>0,),);

$current_user_groups=array();

$subordinate_roles=array();

$parent_roles=array('H1','H2','H8',);

$subordinate_roles_users=array();

$user_info=array('user_name'=>'Ram','is_admin'=>'off','user_password'=>'$2y$10$EsXha8KzD218vGvA1.r2TeCOhKmSxYKEc8aO4/l8W4hHrL8p5d1ZG','confirm_password'=>'$2y$10$EsXha8KzD218vGvA1.r2TeCOhKmSxYKEc8aO4/l8W4hHrL8p5d1ZG','first_name'=>'','last_name'=>'Ram','roleid'=>'H9','email1'=>'lokesh.1997.shetty@gmail.com','status'=>'Active','activity_view'=>'Today','lead_view'=>'Today','hour_format'=>'12','end_hour'=>'','start_hour'=>'09:00','is_owner'=>'','title'=>'','phone_work'=>'','department'=>'','phone_mobile'=>'','reports_to_id'=>'','phone_other'=>'','email2'=>'','phone_fax'=>'','secondaryemail'=>'','phone_home'=>'','date_format'=>'yyyy-mm-dd','signature'=>'','description'=>'','address_street'=>'','address_city'=>'','address_state'=>'','address_postalcode'=>'','address_country'=>'','accesskey'=>'oBXurnSpl2K56bWi','time_zone'=>'America/Godthab','currency_id'=>'2','currency_grouping_pattern'=>'123,456,789','currency_decimal_separator'=>'.','currency_grouping_separator'=>',','currency_symbol_placement'=>'$1.0','imagename'=>'','internal_mailer'=>'0','theme'=>'softed','language'=>'en_us','reminder_interval'=>'','phone_crm_extension'=>'','no_of_currency_decimals'=>'2','truncate_trailing_zeros'=>'0','dayoftheweek'=>'Sunday','callduration'=>'5','othereventduration'=>'5','calendarsharedtype'=>'public','default_record_view'=>'Summary','leftpanelhide'=>'0','rowheight'=>'medium','defaulteventstatus'=>'','defaultactivitytype'=>'','hidecompletedevents'=>'0','defaultcalendarview'=>'','defaultlandingpage'=>'Home','userlabel'=>'Ram','currency_name'=>'India, Rupees','currency_code'=>'INR','currency_symbol'=>'₹','conv_rate'=>'1.00000','record_id'=>'','id'=>'29');
?>