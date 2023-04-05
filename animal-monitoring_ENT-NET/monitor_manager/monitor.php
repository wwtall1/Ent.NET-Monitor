
<fieldset id='foodSide'>
    <legend>Food Status</legend>
    <label for='foodPercent'>Food Percentage: </label><br>
    <b id='foodPercent'><?php echo $setMonitor->getFoodLevelAlert(); ?></b> <!-- Will be Calculated -->
    <br><br>
    <label for='foodWeight'>Food By Weight: </label><br>
    <b id='foodWeight'><?php echo $setMonitor->getFoodLevel(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='foodAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $setMonitor->getFoodLevelAlert();?>' id='foodAlertAt' />
    <br><br>
</fieldset>




<fieldset id='waterSide'>
    <legend>Water Status</legend>
    <label for='waterPercent'>Water Percentage: </label><br>
    <b id='waterPercent'><?php echo $setMonitor->getWaterLevelAlert(); ?></b> <!-- Will be Calculated-->
    <br><br>
    <label for='waterWeight'>Water By Weight: </label><br>
    <b id='waterWeight'><?php echo $setMonitor->getWaterLevel(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='waterAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $setMonitor->getWaterLevelAlert();?>' id='waterAlertAt' />
    <br><br>
</fieldset>