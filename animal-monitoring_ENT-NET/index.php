    <?php 
    require_once('bases/session.php');
    require('bases/Monitor.php');
    require_once('bases/monitor_db.php');
    require_once('bases/database.php');
    check_or_start_session();
    require('bases/User.php');
    $title = "Home Index"; 
    require_once "view/header.php";  ?>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="styles/main.css">
    </head>
    
    <body>
        <h1><i>Welcome to Lionel Klein's Animal Monitor!</i></h1><br>
        <?php if(!isset($_SESSION['user_ID'])): ?>
        <a href="user_manager?controllerRequest=login_user"> Login </a><br>
        <a href="user_manager?controllerRequest=add_user"> Register </a><br>
        <?php endif;?>
        
        <?php if(isset($_SESSION['user_ID'])): ?>
        <a href="monitor_manager?controllerRequest=list_monitors"> Monitors </a><br>
        <a href="monitor_manager?controllerRequest=new_monitor"> Add Monitor </a><br>
        <a href="monitor_manager?controllerRequest=weather_monitor"> Weather Monitor </a><br>
        <?php endif;?>
        <br><br>
        
    </body>
    <?php require_once 'view/footer.php'; ?>