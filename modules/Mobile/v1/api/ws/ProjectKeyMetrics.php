<?php
class Mobile_WS_ProjectKeyMetrics extends Mobile_WS_Controller {

    function process(Mobile_API_Request $request) {
        $response = new Mobile_API_Response();
        $module = $request->get('module');

        if (empty($module)) {
            $response->setError(100, "Module Is Missing");
            return $response;
        }
        $recordId = $request->get('recordId');
        if ($module == "Users") {
            global $uploadingUserImageFormTheApi;
            $uploadingUserImageFormTheApi = true;
            $recordId = '19x' . $request->get('useruniqueid');
        }
        if (empty($recordId)) {
            $response->setError(100, "recordId Is Missing");
            return $response;
        }
        if (strpos($recordId, 'x') == false) {
            $response->setError(100, 'RecordId Is Not Webservice Format');
            return $response;
        }
        
        $recordId = explode('x', $recordId);
        $recordId = $recordId[1];

        $userPrivilegesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
        $projectTaskInstance = Vtiger_Module_Model::getInstance('ProjectTask');
        if($userPrivilegesModel->hasModulePermission($projectTaskInstance->getId())) {
            global $adb;
            $adb = PearDatabase::getInstance();
            
            $recordModel = Vtiger_Record_Model::getInstanceById($recordId);
            $progress = $recordModel->get('progress');

            $query ='SELECT smownerid,enddate,projecttaskstatus,projecttaskpriority
                    FROM vtiger_projecttask
                            INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_projecttask.projecttaskid
                                AND vtiger_crmentity.deleted=0
                            WHERE vtiger_projecttask.projectid = ? ';

            $result = $adb->pquery($query, array($recordId));
            $tasksOpen = $taskCompleted = $taskDue = $taskDeferred = $numOfPeople = 0;
            $highTasks = $lowTasks = $normalTasks = $otherTasks = 0;
            $currentDate = date('Y-m-d');
            $inProgressStatus = array('Open', 'In Progress');
            $usersList = array();

            while($row = $adb->fetchByAssoc($result)) {
                $projectTaskStatus = $row['projecttaskstatus'];
                switch($projectTaskStatus){
                    case 'Open'     : $tasksOpen++;     break;
                    case 'Deferred' : $taskDeferred++;  break;
                    case 'Completed': $taskCompleted++; break;
                }
                $projectTaskPriority = $row['projecttaskpriority'];
                switch($projectTaskPriority){
                    case 'high' : $highTasks++;break;
                    case 'low' : $lowTasks++;break;
                    case 'normal' : $normalTasks++;break;
                    default : $otherTasks++;break;
                }

                if(!empty($row['enddate']) && (strtotime($row['enddate']) < strtotime($currentDate)) &&
                        (in_array($row['projecttaskstatus'], $inProgressStatus))) {
                    $taskDue++;
                }
                $usersList[] = $row['smownerid'];
            }

            $summaryInfo['projecttaskstatus'] =  array(
                                                    'Tasks Open'    => $tasksOpen,
                                                    'Progress'          => $progress,
                                                    'Tasks Due'     => $taskDue,
                                                    'Tasks Completed'=> $taskCompleted,
            );

            $summaryInfo['projecttaskpriority'] =  array(
                                                    'High Priority'    => $highTasks,
                                                    'Normal Priority'  => $normalTasks,
                                                    'Low Priority'     => $lowTasks,
                                                    'Other Priorities'   => $otherTasks,
            );
        }
        $response = new Mobile_API_Response();
        $response->setResult($summaryInfo);
        $response->setApiSucessMessage('Successfully Fetched Data');
        return $response;
    }
}
