<body>
    <div id="weather-any">
        <form action="monitor_manager/index.php" method="post">
        <input type="hidden" readonly name="controllerRequest" value="change_weather">
        <fieldset>
            <legend>Current Degrees:</legend>
            <br><label for="temperature">&nbsp;</label>
            <span id="temperature"><?php if($relayHistory == null){ echo"ERROR READING WEATHER";} else{echo "$relayTempConverted";}    ?></span><br><br>
            <label for="temperatureSelect">&nbsp;</label>
            <select id="temperatureSelect" name="temperatureSelect">
                <option value="1">Fahrenheit</option>
                <option value="2">Celsius</option>
                <option value="3">Kelvin</option>
            </select><br><br>
            <input id="submit" type="submit" value="Change Temperature Type">
        </fieldset>
        <fieldset>
            <legend>Alert:</legend><br>
            <span id="alert"><?php if($relayHistory == null){ echo"ERROR READING WEATHER";} else{echo $relayHistory->getExpectedAlert();}    ?></span><br><br>
        </fieldset>
        </form>
    </div>
    
    
    
</body>
