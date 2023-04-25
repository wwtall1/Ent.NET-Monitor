<?php
class monitor_db {
    function __construct(){}
        static function get_monitor_by_id($ID){
            $db = database::getDB();
                $query = "SELECT * FROM monitor RIGHT JOIN monitorHistory on monitor.id = monitorHistory.monitorID WHERE dateTimeChecked = (SELECT MAX(dateTimeChecked) FROM monitorHistory) AND monitor.id = :ID ORDER BY userID, monitorHistory.dateTimeChecked";
            $statement = $db->prepare($query);    
            $statement->bindValue(':ID', $ID);
            $statement->execute();
            $baseMonitor = $statement->fetchAll();
            $statement->closeCursor();
            $date_time = new DateTime();
            foreach ($baseMonitor as $monitorData){
                $date_time = new DateTime($monitorData['dateTimeChecked']);
                $formated_date = $date_time->format('d/m/y H:i');
                $monitor = new Monitor(
                    $monitorData['monitorID'],   
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
                $query = "SELECT * FROM monitor JOIN monitorHistory ON monitor.id = monitorHistory.monitorID WHERE userID = :userID AND 
                            (monitorHistory.monitorID, monitorHistory.dateTimeChecked) IN (SELECT monitorID, MAX(dateTimeChecked)FROM monitorHistory
                                GROUP BY monitorID) ORDER BY userID, monitorHistory.dateTimeChecked;";
                $statement = $db->prepare($query);
                $statement->bindValue(':userID', $loggedUserID);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
            }
            else
            {
                $query = "SELECT * FROM monitor JOIN monitorHistory ON monitor.id = monitorHistory.monitorID
                            WHERE (monitorHistory.monitorID, monitorHistory.dateTimeChecked) IN (
                                SELECT monitorID, MAX(dateTimeChecked)
                                FROM monitorHistory
                                GROUP BY monitorID
                            )
                            ORDER BY userID, monitorHistory.dateTimeChecked;";
                $statement = $db->prepare($query);
                $statement->execute();
                $baseMonitor = $statement->fetchAll();
                $statement->closeCursor();
            }
                $date_time = new DateTime();
                $monitors = null;
            foreach ($baseMonitor as $monitorData){
                $date_time = new DateTime($monitorData['dateTimeChecked']);
                
                $formated_date = $date_time->format('d/m/y H:i');
                
                $monitor = new Monitor(
                    $monitorData['monitorID'],   
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
            if($monitors == null){
                $monitors[] = new Monitor(0, 0, 0, 0, 0, "NO MONITOR FOUND", 0, 0, "NO MONITOR FOUND", 0, 0, "", "", "NO MONITOR FOUND", "", "", "", 0);
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
    static function update_monitor($monitor){
        $db = database::getDB();  
        $query = 'UPDATE monitor SET userID = :userID, animalCount = :animalCount, foodWeightFull = :foodWeightFull, foodWeightEmpty = :foodWeightEmpty, foodLevelAlert = :foodLevelAlert, waterWeightFull = :waterWeightFull, waterWeightEmpty = :waterWeightEmpty, waterLevelAlert = :waterLevelAlert,  feedingTime = :feedingTime, timeBetweenFeedings = :timeBetweenFeedings, animalType = :animalType, location = :location, notes = :notes, feedType = :feedType WHERE id = :id';
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
        $statement->bindValue(':id', $monitor->getId());

        $statement->execute();
        $statement->closeCursor();
    }
    
    static function remove_monitor($id){
        $db = database::getDB();  
        $query = 'DELETE FROM monitor WHERE id = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $id);
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
    $query = "SELECT weatherHistory.relayID, weatherHistory.degrees, weatherHistory.expectedAlert, timeDateChecked FROM weatherHistory INNER JOIN weatherRelay ON weatherHistory.relayID = weatherRelay.id WHERE timeDateChecked = (SELECT MAX(timeDateChecked) FROM weatherHistory) AND weatherRelay.city = :city AND weatherRelay.state = :state AND weatherRelay.zip = :zip ORDER BY weatherHistory.id AND weatherHistory.timeDateChecked DESC LIMIT 1;";
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
    static function archive_weather(){
    $db = database::getDB();
    
    $query = "INSERT INTO weatherHistory(relayID, degrees, expectedAlert, timeDateChecked) SELECT id, degrees, expectedAlert, NOW() FROM weatherRelay;";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}
    static function archive_monitors(){
        
                $db = database::getDB();

                $queryGet = "SELECT * FROM monitor JOIN monitorHistory ON monitor.id = monitorHistory.monitorID
                            WHERE (monitorHistory.monitorID, monitorHistory.dateTimeChecked) IN (
                                SELECT monitorID, MAX(dateTimeChecked)
                                FROM monitorHistory
                                GROUP BY monitorID
                            )
                            ORDER BY userID, monitorHistory.dateTimeChecked;";
                $statement1 = $db->prepare($queryGet);
                $statement1->execute();
                $baseMonitors = $statement1->fetchAll();
                $statement1->closeCursor();
            foreach ($baseMonitors as $monitorData){
                
                if($monitorData['foodLevel'] != null){
                    $foodSet = round(($monitorData['foodLevel'] - rand(0, $monitorData['foodWeightFull']*.3)), 2);
                    if($foodSet < $monitorData['foodWeightEmpty']){
                       $foodSet = $monitorData['foodWeightEmpty'];
                   }
                }else{
                    $foodSet = $monitorData['foodWeightFull'];
                }
                
                if($monitorData['waterLevel'] != null){
                    $waterSet = round(($monitorData['waterLevel'] - rand(0, $monitorData['waterWeightFull']*.3)), 2);
                    if($waterSet < $monitorData['waterWeightEmpty']){
                        $waterSet = $monitorData['waterWeightEmpty'];
                    }
                }
                else{
                    $waterSet = $monitorData['waterWeightFull'];
                }
                
                $querySet = 'INSERT monitorHistory(monitorID, foodLevel, waterLevel, dateTimeChecked) 
                        VALUES
                            (:monitorID, :foodLevel, :waterLevel, NOW());';
                
                $statement2 = $db->prepare($querySet); 
                $statement2->bindValue(':monitorID', $monitorData['monitorID']);
                $statement2->bindValue(':foodLevel', $foodSet);
                $statement2->bindValue(':waterLevel', $waterSet);
                
                $statement2->execute();
                $statement2->closeCursor();
                }
                    
        
    }
    static function refill_monitor($id){
        
                $db = database::getDB();

                $queryGet = "SELECT * FROM monitor JOIN monitorHistory ON monitor.id = monitorHistory.monitorID
                            WHERE (monitorHistory.monitorID, monitorHistory.dateTimeChecked) IN (
                                SELECT monitorID, MAX(dateTimeChecked)
                                FROM monitorHistory
                                GROUP BY monitorID
                            )
                            ORDER BY userID, monitorHistory.dateTimeChecked;";
                $statement1 = $db->prepare($queryGet);
                $statement1->execute();
                $baseMonitors = $statement1->fetchAll();
                $statement1->closeCursor();
            foreach ($baseMonitors as $monitorData){
                
                if($monitorData['monitorID'] == $id){
                    $querySet = 'INSERT monitorHistory(monitorID, foodLevel, waterLevel, dateTimeChecked) 
                        VALUES
                            (:monitorID, :foodLevel, :waterLevel, NOW());';
                
                $statement2 = $db->prepare($querySet); 
                $statement2->bindValue(':monitorID', $monitorData['monitorID']);
                $statement2->bindValue(':foodLevel', $monitorData['foodWeightFull']);
                $statement2->bindValue(':waterLevel', $monitorData['waterWeightFull']);
                
                $statement2->execute();
                $statement2->closeCursor();
                }
                }
                
                
    }
    static function add_animalType($animalType){
        $db = database::getDB();
        $query = 'INSERT INTO animalType
                         (description, recommendedFood)
                      VALUES
                         (:description, :recommendedFood)';
            $statement = $db->prepare($query);
            $statement->bindValue(':description', $animalType->getDescription());
            $statement->bindValue(':recommendedFood', $animalType->getRecommendedFood());
            $statement->execute();
            $statement->closeCursor();
    }
    static function remove_animalType($id){
        $db = database::getDB();  
        $query = 'DELETE FROM animalType WHERE id = :ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':ID', $id);
        $statement->execute();
        $statement->closeCursor();
    }
    static function get_weather_relays(){
        $db = database::getDB();

        $query = "SELECT city, state, zip, weatherHistory.relayID, weatherHistory.degrees, weatherHistory.expectedAlert, timeDateChecked FROM weatherHistory INNER JOIN weatherRelay ON weatherHistory.relayID = weatherRelay.id WHERE timeDateChecked = (SELECT MAX(timeDateChecked) FROM weatherHistory) ORDER BY weatherHistory.id AND weatherHistory.timeDateChecked DESC;";
        $statement = $db->prepare($query);
                $statement->execute();
                $weatherSet = $statement->fetchAll();
                $statement->closeCursor();
                //$weatherRelays = new WeatherType(0, 0, "error", "No Data Found", "", "", "");
        foreach ($weatherSet as $weather){
            $weatherRelays[] = new WeatherType($weather['relayID'], $weather['degrees'], $weather['expectedAlert'], $weather['timeDateChecked'], $weather['city'], $weather['state'], $weather['zip']);
        }
        return $weatherRelays;
    }
}?>

