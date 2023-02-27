<?php
class monitor_db {
    function __construct(){}
        static function get_monitor_by_id($ID){
            $db = database::getDB();
                $query = "SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE monitor.id = :ID ORDER BY monitorHistory.dateTimeChecked, userID";
            $statement = $db->prepare($query);
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $baseMonitor = $statement->fetchAll();
            $statement->closeCursor();
            $date_time = new DateTime();
            foreach ($baseMonitor as $monitorData){
                $date_time = DateTime($monitorData['dateTimeChecked']);
                $formated_date = $date_time->format('d/m/y H:i');
                $monitor = new Monitor(
                    $monitorData['id'],   
                    $monitorData['userID'], 
                    $monitorData['animalCount'], 
                    $monitorData['foodWeightFull'], 
                    $monitorData['foodWeightEmpty'], 
                    $monitorData['foodLevelAlert'], 
                    $monitorData['waterWeightFull'], 
                    $monitorData['waterWeightEmpty'], 
                    $monitorData['waterLevelAlert'], 
                    $monitorData['feedingTime'], 
                    $monitorData['timeBetweenFeedings'], 
                    $monitorData['animalType'], 
                    $monitorData['location'], 
                    $monitorData['notes'], 
                    $monitorData['feedType'],
                    $monitorData['foodLevel'],
                    $monitorData['waterLevel'],
                    $formated_date);
                }
            return $monitor;
        }
    static function get_monitors($loggedUserID, $loggedUserType){
        $db = database::getDB();
        
        if (isset($loggedUserID) && $loggedUserID != null && $loggedUserID != '') 
        {
           /* if($loggedUserType == 1){
                $query = "SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE userID = :userID ORDER BY monitorHistory.dateTimeChecked, userID";
                $statement = $db->prepare($query);
                $statement->bindValue(':userID', $loggedUserID);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
            }
            else
            {*/
                $query = "SELECT * FROM monitor JOIN monitorHistory on monitor.id = monitorHistory.monitorID ORDER BY monitorHistory.dateTimeChecked, userID";
                $statement = $db->prepare($query);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
           // }
                $date_time = new DateTime();
            foreach ($baseMonitor as $monitorData){
                $date_time = new DateTime($monitorData['dateTimeChecked']);
                $formated_date = $date_time->format('d/m/y H:i');
                $monitor = new Monitor(
                    $monitorData['id'],   
                    $monitorData['userID'], 
                    $monitorData['animalCount'], 
                    $monitorData['foodWeightFull'], 
                    $monitorData['foodWeightEmpty'], 
                    $monitorData['foodLevelAlert'], 
                    $monitorData['waterWeightFull'], 
                    $monitorData['waterWeightEmpty'], 
                    $monitorData['waterLevelAlert'], 
                    $monitorData['feedingTime'], 
                    $monitorData['timeBetweenFeedings'], 
                    $monitorData['animalType'], 
                    $monitorData['location'], 
                    $monitorData['notes'], 
                    $monitorData['feedType'],
                    $monitorData['foodLevel'],
                    $monitorData['waterLevel'],
                    $formated_date);
                    $monitors[] = $monitor;
                }
            }
            return $monitors;
        }
    
}?>

