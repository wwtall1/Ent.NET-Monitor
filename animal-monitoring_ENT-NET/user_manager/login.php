
    <body>
       <form action="user_manager/index.php" method="post">
           <input type="hidden" readonly name="controllerRequest" value="validate_login">
           <?php if($validLogin != true){
           echo "<p>Login Failed! Please input valid Email and Password</p>"; } ?>
        <div id="data">
            <label>E-mail:</label>
            <input type="text" name="email"
                   value="17083585@northwoodtech.edu">
            <br>
            <label>Password:</label>
            <input type="text" name="password"
                   value="testPass23">
            <br>
<!-- <?php echo htmlspecialchars($email); ?>   <?php echo htmlspecialchars($password); ?> -->
        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>
        </div>
    </form>    
        <br><br>
        <table>
            <tr>
                <th>
                    Email:
                </th>
                <th>
                    Pass:
                </th>
                <th>
                    Type:
                </th>
            </tr>
            <tr>
                <td>
                    17083585@northwoodtech.edu
                </td>
                <td>
                    testPass25
                </td>
                <td>
                    User
                </td>
            </tr>
            <tr>
                <td>
                    17083585@northwoodtech.edu
                </td>
                <td>
                    testPass23
                </td>
                <td>
                    Admin
                </td>
            </tr>
            <tr>
                <td>
                    17083585@northwoodtech.edu
                </td>
                <td>
                    noRealPass
                </td>
                <td>
                    User
                </td>
            </tr>
        </table>
    </body>

