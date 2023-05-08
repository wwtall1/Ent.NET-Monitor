
<fieldset id='foodSide'>
    <legend>Food Status</legend>
    <label for='foodPercent'>Food Percentage: </label>
    <b id='foodPercent'><?php if($setMonitor->getFoodLevel() != null){echo round((($setMonitor->getFoodLevel()/$setMonitor->getFoodWeightFull()) * 100), 2);}else{echo "Relay Not Installed!";} ?></b> <!-- Will be Calculated -->
    <br><br>
    <label for='foodWeight'>Food By Weight: </label>
    <b id='foodWeight'><?php if($setMonitor->getFoodLevel() != null){echo $setMonitor->getFoodLevel();}else{echo "Relay Not Installed!";} ?></b> 
    <br><br>
    <label for='foodAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $setMonitor->getFoodLevelAlert();?>' id='foodAlertAt' />
    <br><br>
</fieldset>
<fieldset id='waterSide'>
    <legend>Water Status</legend>
    <label for='waterPercent'>Water Percentage: </label>
    <b id='waterPercent'><?php if($setMonitor->getWaterLevel() != null){echo round(((  $setMonitor->getWaterLevel()/$setMonitor->getWaterWeightFull()) * 100), 2);}else{echo "Relay Not Installed!";} ?></b> <!-- Will be Calculated-->
    <br><br>
    <label for='waterWeight'>Water By Weight: </label>
    <b id='waterWeight'><?php  if($setMonitor->getFoodLevel() != null){echo $setMonitor->getWaterLevel(); }else{echo "Relay Not Installed!";}?></b> 
    <br><br>
    <label for='waterAlertAt'>Alert At Percentage: </label>
    <input type='text' value='<?php echo $setMonitor->getWaterLevelAlert();?>' id='waterAlertAt' />
    <br><br>
</fieldset>
<form action="monitor_manager/index.php" method="post">
    <input type="hidden" name="controllerRequest" value="remove_monitor">
    <input type="hidden" name="monitorID" id="monitorID" value="<?php echo $setMonitor->getId(); ?>">
    <input type="submit" value="Remove Monitor"<?php if($setMonitor->getId() == null || $setMonitor->getId() == 0){echo 'disabled';} ?>>
</form>
<form action="monitor_manager/index.php" method="post">
    <input type="hidden" name="controllerRequest" value="edit_monitor">
    <input type="hidden" name="monitorID" id="monitorID" value="<?php echo $setMonitor->getId(); ?>">
    <input type="submit" value="Edit Monitor"<?php if($setMonitor->getId() == null || $setMonitor->getId() == 0){echo 'disabled';} ?>>
</form>
<form action="monitor_manager/index.php" method="post">
    <input type="hidden" name="controllerRequest" value="fill_monitor">
    <input type="hidden" name="monitorID" id="monitorID" value="<?php echo $setMonitor->getId(); ?>">
    <input type="submit" value="Fill Monitor"<?php if($setMonitor->getId() == null || $setMonitor->getId() == 0){echo 'disabled';} ?>>
</form>