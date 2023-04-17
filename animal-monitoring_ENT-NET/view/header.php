<html>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="../styles/main.css">
            <base href="http://localhost/animal-monitoring_ENT-NET/">
            
    </head>
<header>
    <h1> Lionel Klein Sites</h1>
    <nav>
        <a href="/animal-monitoring_ENT-NET/index.php"> Home </a>
        <?php if(!isset($_SESSION['user_ID'])): ?>
            <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=login_user"> Login </a><br>
            <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=add_user"> Register </a><br>
        <?php endif;?>
        <?php if(isset($_SESSION['user_ID'])): ?>
            <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_monitors"> Monitors </a><br>
            <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=new_monitor"> Add Monitor </a><br>
            <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=weather_monitor"> Weather Monitor </a><br>
            <a href="/animal-monitoring_ENT-NET/user_manager?controllerRequest=logout_user"> Log Out </a><br>
            <?php if(isset($_SESSION['userType'])): ?>
                <?php if($_SESSION['userType'] != 1): ?>
                    <br><a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=new_animal"> Add Animal Type </a><br>
                    <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_animals"> Animal Type List </a><br>
                    <a href="/animal-monitoring_ENT-NET/monitor_manager?controllerRequest=list_weather_monitors"> Weather Monitor List </a><br>
                <?php endif;?>
            <?php endif;?>
        <?php endif;?>
    </nav>
</header>
    