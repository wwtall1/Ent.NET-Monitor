<?php
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
    $monitorSet = filter_input(INPUT_POST, 'setMonitor');
    require_once("monitor_list.php");

    
    
}
else if($controllerChoice =='set_monitor'){
    require_once("monitor.php");
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