<?php
require_once('../bases/session.php');
require('../bases/Monitor.php');
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
    $setMonitor = $monitors;

    
    require_once("monitor_list.php");

    
    
}
else if($controllerChoice =='swap_monitor'){
    $title = "Monitor List Page";
    $monitors = monitor_db::get_monitors($_SESSION['user_ID'], $_SESSION['userType']);
    $setMonitor = $monitors;
    $ifMonitor = filter_input(INPUT_POST, 'setMonitor');
    foreach($monitors as $checkMonitor){
        if($checkMonitor->getId() == $ifMonitor){
            $setMonitor = $checkMonitor;
        }
    }
    require_once("monitor_list.php");
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