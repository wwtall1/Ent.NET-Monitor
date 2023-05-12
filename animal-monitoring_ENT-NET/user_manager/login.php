
    <body>
       <form action="user_manager/index.php" method="post">
           <input type="hidden" readonly name="controllerRequest" value="validate_login">
           <?php if($validLogin != true){
           echo "<p>Login Failed! Please input valid Email and Password</p>"; } ?>
        <div id="data">
            <label>E-mail:</label>
            <input type="text" name="email"
                   value="">
            <br>
            <label>Password:</label>
            <input type="text" name="password"
                   value="">
            <br>
<!-- <?php echo htmlspecialchars($email); ?>   <?php echo htmlspecialchars($password); ?> -->
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>
        </div>
    </form>    
        <br><br>
    </body>

