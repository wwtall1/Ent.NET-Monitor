<?php
require_once('../bases/session.php');
require('../bases/Monitor.php');
require('../bases/AnimalType.php');
require('../bases/WeatherType.php');
require_once('../bases/monitor_db.php');
check_or_start_session();
require_once('../bases/database.php');
require('../bases/User.php');
require_once('../bases/user_db.php');
require_once "../view/header.php";


$controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ( $controllerChoice == NULL) {
     $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
    if ( $controllerChoice == NULL) {
         $controllerChoice = 'Not Set (Null)';
    }
}  



if($controllerChoice == 'list_monitors'){
    $title = "Monitor List Page";
    $monitors = monitor_db::get_monitors($_SESSION['user_ID'], $_SESSION['userType']);
    $showMonitors = false;

    
    require_once("monitor_list.php");

    
    
}
else if($controllerChoice =='swap_monitor'){
    $title = "Monitor List Page";
    $monitors = monitor_db::get_monitors($_SESSION['user_ID'], $_SESSION['userType']);
    $setMonitor = $monitors[1];
    $ifMonitor = filter_input(INPUT_POST, 'setMonitor');
    $showMonitors = true;
    foreach($monitors as $checkMonitor){
        if($checkMonitor->getId() == $ifMonitor){
            $setMonitor = $checkMonitor;
        }
    }
    require_once("monitor_list.php");
}
else if($controllerChoice == 'new_monitor'){
    
    $title = "Add a Monitor!";
    
    $critters = monitor_db::get_animal_types();
    require_once("add_monitor.php"); 
}
else if($controllerChoice == 'add_monitor'){
    $validMonitor = true;
    
    if(filter_input(INPUT_POST, 'userId') != null){
    $userID = filter_input(INPUT_POST, 'userId');
    }
    else{$validMonitor = false;}
    $foodWeightFull = filter_input(INPUT_POST, 'foodFull');
    $foodWeightEmpty = filter_input(INPUT_POST, 'foodEmpty');
    $foodAlert = filter_input(INPUT_POST, 'foodAlert');
    $waterWeightFull = filter_input(INPUT_POST, 'waterFull');
    $waterWeightEmpty = filter_input(INPUT_POST, 'waterEmpty');
    $waterAlert = filter_input(INPUT_POST, 'waterAlert');
    $animalCount = filter_input(INPUT_POST, 'animalCount');
    $feedingTime = htmlspecialchars(filter_input(INPUT_POST, 'feedingTime'));
    $animalType = filter_input(INPUT_POST, 'animalType');
    $location = filter_input(INPUT_POST, 'location');
    $notes  = filter_input(INPUT_POST, 'notes');
    $feedType  = filter_input(INPUT_POST, 'feedType');

    $date_str = date('Y-m-d'); 
    $date_time_str = trim($date_str . ' ' . $feedingTime . ''); 
    $date_time = DateTime::createFromFormat('Y-m-d H:i', $date_time_str); 
    $errors = DateTime::getLastErrors();
    
    
    if ($errors['warning_count'] + $errors['error_count'] > 0) {
        $title = "Add a Monitor! (with a valid Time!!)";
        $critters = monitor_db::get_animal_types();
        require_once("add_monitor.php"); 
    } else {
        $date_time_formatted = $date_time->format('Y-m-d H:i');
        $monitor = new Monitor(1, $userID, $animalCount, $foodWeightFull, $foodWeightEmpty, $foodAlert, $waterWeightFull, $waterWeightEmpty, $waterAlert, $date_time_formatted, 24, $animalType, $location, $notes, $feedType, 50, 50, $date_time_formatted);

        monitor_db::add_monitor($monitor);
        
        header('Location: ../index.php');
    }
    
    
}
else if($controllerChoice == 'weather_monitor'){

    $relayHistory = monitor_db::get_weather($_SESSION['user_ID']);
    $setTemperatureType = filter_input(INPUT_POST, 'temperatureSelect');
    if($setTemperatureType == null || $setTemperatureType == ""){
       $setTemperatureType = filter_input(INPUT_GET, 'temperatureSelect'); 
    }
    $relayTempConverted = 0;
    
    
    switch($setTemperatureType){
        default:
        case '1':
            $relayTempConverted = $relayHistory->getDegrees();
            break;
        case'2':
            $relayTempConverted = ((doubleval($relayHistory->getDegrees()) - 32 ) * (5/9));
        case'3':
            $relayTempConverted = doubleval($relayTempConverted) + 273.15;
            break;
            
    }
    require_once('weather_monitor.php');
    
    
    
    
}


    



else {
        echo"<br>";
        echo "<h1>Not yet implimented... </h1>";
        echo "<h2> controllerChoice:  $controllerChoice</h2>";
        echo "<h3> File:  customer_manager/index.php </h3>";
        $title = $controllerChoice;
        require_once '../view/footer.php';
      
}
/* require_once '../include/showGetPostVariables.php';
funShowAllPOSTandGETvariables(); */
require_once '../view/footer.php';


?>