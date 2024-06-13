<?php

include_once dirname(_FILE_, 5) . '\Settings\MenuEditor\models\module.php';

class Mobile_WS_getMenuStructure extends Mobile_WS_Controller {

    function process(Mobile_API_Request $request) {
        $groupings['grouping'] = Settings_MenuEditor_Module_Model::getAllVisibleModulesMobile();
        $response = new Mobile_API_Response();
        $response->setResult($groupings);
        $response->setApiSucessMessage('Successfully Fetched Data');
        return $response;
}

}