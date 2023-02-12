<body>
        <form>
        <div>
            <span>
            <?php foreach ($userFinal as $userData) : ?>
            <?php
                if($isGood == true)
            {
                 echo "<p>UserID: $userData[id]</p>"
                        . "<p>Email: $email</p>"
                        . "<p>Password: $password</p>"
                        . "<p>Name: $userData[firstName] $userData[lastName]</p>"
                        . "<p>Address: $userData[address]</p>"
                        . "<p>City: $userData[city]</p>"
                        . "<p>State: $userData[state]</p>"
                        . "<p>Postal Code: $userData[zip]</p>";
            }
            else
            {
                echo "<p>Invalid Email or Password! Please return to the Login page!</p>";
            }
            ?>
            <?php endforeach; ?>
            </span>
        </div>
    </form>    
        <br><br>
    </body>