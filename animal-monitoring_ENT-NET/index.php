    <?php 
    require_once('bases/session.php');
    require('bases/Monitor.php');
    require_once('bases/monitor_db.php');
    require_once('bases/database.php');
    check_or_start_session();
    require('bases/User.php');
    $title = "Home Index"; 
    require_once ("view/header.php");  ?>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="styles/main.css">
    </head>
    
    <body>
        <h1><i>Welcome to Lionel Klein's Animal Monitor!</i></h1><br>
        <?php if(!isset($_SESSION['user_ID'])): ?>
        <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=login_user"> Login </a><br>
        <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=add_user"> Register </a><br>
        <?php endif;?>
        
        <?php if(isset($_SESSION['user_ID'])): ?>
        <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=edit_user"> Edit Profile </a><br><br>
        <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_monitors"> Monitors </a><br>
        <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=new_monitor"> Add Monitor </a><br><br>
        <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=weather_monitor"> Weather Monitor </a><br>
            <?php if(isset($_SESSION['userType'])): ?>
                <?php if($_SESSION['userType'] != 1): ?>
                    <br><a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=list_users"> List Users </a><br><br>
                    <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=new_animal"> Add Animal Type </a><br>
                    <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_animals"> Animal Type List </a><br><br>
                    <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_weather_monitors"> Weather Monitor List </a><br>
                <?php endif;?>
            <?php endif;?>
        <?php endif;?>
        <br><br>
        
    </body>
    <?php require_once 'view/footer.php'; ?>