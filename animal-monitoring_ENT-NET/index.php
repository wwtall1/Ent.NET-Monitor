    <?php require_once('bases/database.php');
    require('bases/User.php');
    $title = "Home Index"; 
    require_once "view/header.php";  ?>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" type="text/css" href="styles/main.css">
    </head>
    
    <body>
        <h1><i>Welcome to Lionel Klein's Animal Monitor!</i></h1><br>
        <a href="user_manager?controllerRequest=login_user"> Login </a><br>
        <a href="user_manager?controllerRequest=add_user"> Register </a><br>
        <a href="monitor_manager?controllerRequest=list_monitors"> Monitors </a><br>
        
        <br><br>

    </body>
    <?php require_once 'view/footer.php'; ?>