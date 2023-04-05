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
            if($loggedUserType == 1){
                $query = "SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE userID = :userID ORDER BY monitorHistory.dateTimeChecked, userID";
                $statement = $db->prepare($query);
                $statement->bindValue(':userID', $loggedUserID);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
            }
            else
            {
                $query = "SELECT * FROM monitor JOIN monitorHistory on monitor.id = monitorHistory.monitorID ORDER BY monitorHistory.dateTimeChecked, userID";
                $statement = $db->prepare($query);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
            }
                $date_time = new DateTime();
                $monitors;
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
    static function add_monitor($monitor){
        $db = database::getDB();  
        $query = 'INSERT monitor
                     (userID, animalCount, foodWeightFull, foodWeightEmpty, foodLevelAlert, waterWeightFull, waterWeightEmpty, waterLevelAlert, feedingTime, timeBetweenFeedings, animalType, location, notes, feedType)
                  VALUES
                     (:userID, :animalCount, :foodWeightFull, :foodWeightEmpty, :foodLevelAlert, :waterWeightFull, :waterWeightEmpty, :waterLevelAlert, :feedingTime, :timeBetweenFeedings, :animalType, :location, :notes, :feedType)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $monitor->getUserID());
        $statement->bindValue(':animalCount', $monitor->getAnimalCount());
        $statement->bindValue(':foodWeightFull', $monitor->getFoodWeightFull());
        $statement->bindValue(':foodWeightEmpty', $monitor->getFoodWeightEmpty());
        $statement->bindValue(':foodLevelAlert', $monitor->getFoodLevelAlert());
        $statement->bindValue(':waterWeightFull', $monitor->getWaterWeightFull());
        $statement->bindValue(':waterWeightEmpty', $monitor->getWaterWeightEmpty());
        $statement->bindValue(':waterLevelAlert', $monitor->getWaterLevelAlert());
        $statement->bindValue(':feedingTime', $monitor->getFeedingTime());
        $statement->bindValue(':timeBetweenFeedings', $monitor->getTimeBetweenFeedings());
        $statement->bindValue(':animalType', $monitor->getAnimalType());
        $statement->bindValue(':location', $monitor->getLocation());
        $statement->bindValue(':notes', $monitor->getNotes());
        $statement->bindValue(':feedType', $monitor->getFeedType());

        $statement->execute();
        $statement->closeCursor();
    }
static function get_animal_types(){
        $db = database::getDB();
        
                $query = "SELECT * FROM animalType";
                $statement = $db->prepare($query);
                $statement->execute();
                $types = $statement->fetchAll();
                $statement->closeCursor();
                $animalTypes = array();
            foreach ($types as $type){
                $animalType = new AnimalType(
                    $type['id'],   
                    $type['description'], 
                    $type['recommendedFood']);
                    $animalTypes[] = $animalType;
                }
            return $animalTypes;
        }
static function get_weather($userID){
    $db = database::getDB();
    
    $user = User_db::get_user_by_id($userID);
    
    $query = "SELECT weatherHistory.relayID, weatherHistory.degrees, weatherHistory.expectedAlert, timeDateChecked FROM weatherHistory INNER JOIN weatherRelay ON weatherHistory.relayID = weatherRelay.id WHERE weatherRelay.city = :city AND weatherRelay.state = :state AND weatherRelay.zip = :zip ORDER BY weatherHistory.timeDateChecked DESC LIMIT 1;";
    $statement = $db->prepare($query);
            $statement->bindValue(':city', $user->getCity());
            $statement->bindValue(':state', $user->getState());
            $statement->bindValue(':zip', $user->getZip());
            $statement->execute();
            $weatherSet = $statement->fetchAll();
            $statement->closeCursor();
            $weatherRelay = new WeatherType(0, 0, "error", "No Data Found", "", "", "");
    foreach ($weatherSet as $weather){
        $weatherRelay = new WeatherType($weather['relayID'], $weather['degrees'], $weather['expectedAlert'], $weather['timeDateChecked'], $user->getCity(), $user->getState(), $user->getZip());
    }
    return $weatherRelay;
            
}
    
}?>

