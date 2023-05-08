<body>
       <form action="user_manager/index.php" method="post">
           <?php if(!isset($_SESSION['user_ID'])){echo("<input type='hidden' name='controllerRequest' value='validate_add_user'>");} 
           else if(isset($_SESSION['user_ID'])){echo("<input type='hidden' name='controllerRequest' value='validate_edit_user'>");
           echo("<label for='userID'> User ID: </label>");
           echo("<input type='text' name='userID' id='userID' value='".$user->getId()."' readonly> <br>");
           }?>
        <div id="data">
            <p><?php echo $errorMessage; ?></p>
            <label>First Name:</label>
            <input type="text" name="firstName" value="<?php echo($user->getFirstName()); ?>"> <br>
            <label>Last Name:</label>
            <input type="text" name="lastName" value="<?php echo($user->getLastName()); ?>">  <br>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo ($user->getPhone()); ?>"> <br>
            <label>E-mail:</label>
            <input type="text" name="email" value="<?php echo ($user->getEmail()); ?>"> <br>
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo ($user->getAddress()); ?>"> <br>
            <label>City:</label>
            <input type="text" name="city" value="<?php echo ($user->getCity()); ?>"> <br>
            <label>State:</label>
            <input type="text" name="state" value="<?php echo ($user->getState()); ?>" max="2"> <br>
            <label>Zip:</label>
            <input type="text" name="zip" value="<?php echo ($user->getZip()); ?>"> <br>
            <label>Active:</label>
            <input type="checkbox" name="active" <?php if($user->getIsActive()){echo 'checked';} ?>> <br>
            <?php if(!isset($_SESSION['user_ID'])){echo("<label>Password:</label>
            <input type='text' name='password'> <br>");} 
           else if(isset($_SESSION['user_ID'])){echo("<label>Old Password:</label>
            <input type='text' name='oldPassword'> <br>
            <label>New Password:</label>
            <input type='text' name='newPassword'> <br>
            <label>Confirm Password:</label>
            <input type='text' name='confirmPassword'> <br>");
           }?>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br></div>
        </div>
    </form>    
        <br><br>
    </body>