<?php
function check_or_start_session(){
    if (session_id() == '') { 
          $lifetime = 60 * 60 * 24 * 3; 
          // 3 days
           session_set_cookie_params($lifetime, '/'); 
           session_start();
    } 
}
function end_session(){
    session_destroy(); 
    $_SESSION = array();
}
function user_login($ID, $firstName, $lastName, $UserTypeID){
    $_SESSION['user_ID'] = $ID; 
    $_SESSION['firstName'] = $firstName; 
    $_SESSION['lastName'] = $lastName;
    $_SESSION['userType'] = $UserTypeID;
}
?>