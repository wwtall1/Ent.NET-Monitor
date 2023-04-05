<body>
    <form action="monitor_manager/index.php" method="post">
    <input type="hidden" readonly name="controllerRequest" value="change_weather">
    <fieldset>
        <legend>Current Degrees:</legend>
        <br><span id="temperature"><?php if($relayHistory == null){ echo"ERROR READING WEATHER";} else{echo "$relayTempConverted";}    ?></span><br>
        <label for="temperatureSelect">&nbsp;</label>
        <select id="temperatureSelect" name="temperatureSelect">
            <option value="1">Fahrenheit</option>
            <option value="2">Celsius</option>
            <option value="3">Kelvin</option>
        </select><br>
        <input type="submit" value="Change Temperature Type">
    </fieldset>
    <fieldset>
        <legend>Alert:</legend><br>
        <span id="alert"><?php if($relayHistory == null){ echo"ERROR READING WEATHER";} else{echo $relayHistory->getExpectedAlert();}    ?></span><br><br>
    </fieldset>
    <fieldset disabled="false"> <!-- if(user IS NOT admin), disable -->
        <legend>Location:</legend>
        <br><label for="city">City:</label>
        <input type="text" id="city" name="city" value='<?php echo $relayHistory->getCity(); ?>'><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value='<?php echo $relayHistory->getState(); ?>'><br>
        <label for="city">Zip:</label>
        <input type="text" id="zip" name="zip" value="<?php echo $relayHistory->getZip(); ?>"><br><br>
    </fieldset>
        
    
        
    </form>
    
    
    
    
</body>
