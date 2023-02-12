<body>
       <form action="user_manager/index.php" method="post">
           <input type="hidden" readonly name="controllerRequest" value="validate_add_user">
        <div id="data">
            <p><?php echo $errorMessage; ?></p>
            <label>First Name:</label>
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"> <br>
            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">  <br>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"> <br>
            <label>E-mail:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"> <br>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>"> <br>
            <label>City:</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"> <br>
            <label>State:</label>
            <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>" max="2"> <br>
            <label>Zip:</label>
            <input type="text" name="zip" value="<?php echo htmlspecialchars($zip); ?>"> <br>
            <label>Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>"> <br>
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br></div>
        </div>
    </form>    
        <br><br>
    </body>