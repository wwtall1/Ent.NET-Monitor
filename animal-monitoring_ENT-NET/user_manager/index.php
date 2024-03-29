<?php
require_once('../bases/session.php');
require('../bases/Monitor.php');
require_once('../bases/monitor_db.php');
check_or_start_session();
require_once('../bases/database.php');
require('../bases/User.php');
require_once('../bases/user_db.php');
require_once ("../view/header.php");


$controllerChoice = filter_input(INPUT_POST, 'controllerRequest');
if ( $controllerChoice == NULL) {
     $controllerChoice = filter_input(INPUT_GET, 'controllerRequest');
    if ( $controllerChoice == NULL) {
         $controllerChoice = 'Not Set (Null)';
    }
}  


if($controllerChoice == 'login_user'){
    $errorMessage = "";
    $email = filter_input(INPUT_COOKIE, 'emailCookie');
    $password = filter_input(INPUT_COOKIE, 'passwordCookie');
    $validLogin = filter_input(INPUT_GET, 'validLogin');
    if($validLogin == null){
        $validLogin=true;
    }
    $title = "Login";
    require_once("login.php");
}
else if($controllerChoice == 'validate_login'){
    $title = "Logging In.. maybe?";
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if ($email == null || $email == ''|| $password == null || $password == '') {
        $validLogin = false;
        $errorMessage = "Please enter a valid email and password";
        include('login.php');
    } 
    else {
        $user = User_db::get_user_by_email_password($email, $password);
        if ($user != false && $user != null){
           $ID = $user->getId();       
        }
        else{$ID = 0;}
        if($ID > 0){
                $login_message = "Login Succesful";
                $validLogin = true;
                $isGood = false;
                $query = "SELECT *
                FROM user
                WHERE email = '$email' AND password = '$password'" ;
                $db = database::getDB();
                $statement = $db->prepare($query);
                $statement->execute();
                $userFinal = $statement->fetchAll();

         if($user != null){
             $isGood = true;
             user_login($user->getId(), $user->getFirstName(), $user->getLastName(), $user->getUserTypeID());
             $statement->closeCursor();
         }else{
             $statement->closeCursor();
             header("Location: user_manager/login.php?validLogin=no");
         }
                 include('login_process.php');
        } 
        else{
            $errorMessage = "Incorrect email or password";
            $validLogin = false;
            include('login.php');
        }
    }
    
}
else if ($controllerChoice == 'add_user'){
    $errorMessage = "";
    $title = "Adding a Customer...";
    if (!isset($firstName)) { $firstName = ''; }
    if (!isset($lastName)) { $lastName = ''; }
    if (!isset($phone)) { $phone = ''; }
    if (!isset($email)) { $email = ''; }
    if (!isset($address)) { $address = ''; }
    if (!isset($city)) { $city = ''; }
    if (!isset($state)) { $state = ''; }
    if (!isset($zip)) { $zip = ''; }
    if (!isset($password)) { $password = ''; }
    $user = new User(0, 0, $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $password, 0);
    require_once("register.php");
}
else if ($controllerChoice == 'validate_add_user'){    
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = trim(filter_input(INPUT_POST, 'state'));
    $zip = filter_input(INPUT_POST, 'zip');
    $password = filter_input(INPUT_POST, 'password');

    if(!User_db::search_user_list_email($email)){
        $title = "A New User!"; 
        $user = new User(0, 1, $firstName, $lastName, $phone, $email, $address, $city, $state, $zip,$password, 1,);
    User_db::add_user($user);
    //user_login($user->getId(), $user->getFirstName(), $user->getLastName(), $user->getUserTypeID());
    require_once("register_process.php");
    }else{
    $errorMessage = "User already exists with this E-mail!";
    $user = new User(0, 0, $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $password, 0);
    $title = "Adding a User...";
    require_once("register.php");
    }   
}
else if($controllerChoice == 'list_users'){
    $title = "User List (Admins Only!)";
    $users = User_db::list_users();
    
    require_once('user_list.php');
}
else if($controllerChoice == 'edit_user'){
    $errorMessage = "";
    $title = "Updating a Customer...";
    
    $userID = filter_input(INPUT_POST, 'userID');
    if(!isset($userID) || $userID == null || $userID == 0){
        $userID = $_SESSION['user_ID'];
    }
    $user = User_db::get_user_by_id($userID);
    
    require_once("register.php");
}
else if ($controllerChoice == 'validate_edit_user'){    
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = trim(filter_input(INPUT_POST, 'state'));
    $zip = filter_input(INPUT_POST, 'zip');
    $isActive = filter_input(INPUT_POST, 'active', FILTER_VALIDATE_BOOLEAN);
    $oldPassword = filter_input(INPUT_POST, 'oldPassword');
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');
    $userID = filter_input(INPUT_POST, 'userID');
    
    $oldUser = User_db::get_user_by_id($userID);
    
    if($oldUser->getPassword() == $oldPassword && $newPassword == $confirmPassword){
        $newUser = new User($userID, 1, $firstName, $lastName, $phone, $email, $address, $city, $state, $zip, $newPassword, $isActive);
        User_db::update_user($newUser);
        header("Location: ../index.php");
    }else{
        $errorMessage = "Please Ensure all data is Valid!";
        $title = "Updating a Customer...";

        $userID = filter_input(INPUT_POST, 'userID');
        if(!isset($userID) || $userID == null || $userID == 0){
            $userID = $_SESSION['user_ID'];
        }
        $user = User_db::get_user_by_id($userID);

        require_once("register.php");
        }   
}

else if($controllerChoice == 'logout_user'){
    end_session();
    
    header("Location: ../index.php");
    
}


// Final else very helpful for debugging.
else {
      // Show this is an unhandled $controllerChoice
       // Show generic else page
          require_once '../view/header.php'; 
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