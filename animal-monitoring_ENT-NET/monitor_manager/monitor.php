
<fieldset id='foodSide'>
    <legend>Food Status</legend>
    <label for='foodPercent'>Food Percentage: </label><br>
    <b id='foodPercent'><?php echo $gottenMonitor->getFoodLevelAlert(); ?></b> <!-- Will be Calculated -->
    <br><br>
    <label for='foodWeight'>Food By Weight: </label><br>
    <b id='foodWeight'><?php echo $gottenMonitor->getFoodLevel(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='foodAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $gottenMonitor->getFoodLevelAlert();?>' id='foodAlertAt' />
    <br><br>
</fieldset>




<fieldset id='waterSide'>
    <legend>Water Status</legend>
    <label for='waterPercent'>Water Percentage: </label><br>
    <b id='waterPercent'><?php echo $gottenMonitor->getWaterLevelAlert(); ?></b> <!-- Will be Calculated-->
    <br><br>
    <label for='waterWeight'>Water By Weight: </label><br>
    <b id='waterWeight'><?php echo $gottenMonitor->getWaterLevel(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='waterAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $gottenMonitor->getWaterLevelAlert();?>' id='waterAlertAt' />
    <br><br>
</fieldset>