


<form action="monitor_manager/index.php" method="post">
    <?php if(str_contains($title, "Add")){
            echo"<input type='hidden' readonly name='controllerRequest' value='add_monitor'>";
        }else if(str_contains($title, "Edit")){
            echo"<input type='hidden' readonly name='controllerRequest' value='confirm_edit_monitor'>";
    } ?>
<!-- Admins should not need to make Monitors for Users. -->
<fieldset id="metaField">
    <label for='userId'>User ID: </label>
    <input type='text' name='userId' id='userId' value='<?php echo $_SESSION['user_ID']; if($_SESSION['userType'] == 1){echo 'hidden';} ?> '>
    <input type="hidden" name="monitorID" id="monitorID" <?php if(isset($monitorID)){ echo('value="'.$monitorID.'"'); }else{ echo "value='0'";} ?>>
<fieldset id='foodSide'>
    <legend>Food Dish Setup</legend>
    <label for='foodFull'>Weight when Full (Pounds): </label>
    <input type="text" name="foodFull" id="foodFull" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getFoodWeightFull().'"'); } ?>><br><br>
    <br><br>
    <label for='foodEmpty'>Weight when Empty: </label>
    <input type="text" name="foodEmpty" id="foodEmpty" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getFoodWeightEmpty().'"'); } ?>><br><br>
    <label for="foodAlert">Alert at Percent:</label>
    <input type="number" name="foodAlert" id="foodAlert" <?php if(isset($setMonitor)){ echo('value="'.htmlspecialchars($setMonitor->getFoodLevelAlert()).'"'); } ?> max="100">
    <br><br>
</fieldset>
<fieldset id='waterSide'>
    <legend>Water Dish Setup</legend>
    <label for='waterFull'>Weight when Full (Pounds): </label>
    <input type="text" name="waterFull" id="waterFull" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getWaterWeightFull().'"'); } ?>><br><br>
    <br><br>
    <label for='waterEmpty'>Weight when Empty: </label>
    <input type="text" name="waterEmpty"id="waterEmpty" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getWaterWeightEmpty().'"'); } ?>><br><br>
    <label for="waterAlert">Alert at Percent:</label>
    <input type="number" name="waterAlert" id="waterAlert" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getWaterLevelAlert().'"'); } ?> max="100">
    <br><br>
</fieldset>
<fieldset id="critterSide">
    <legend>Critter Info: </legend>
    <label for="animalCount">Critter Count:</label>
    <input type="text" name="animalCount" id="animalCount" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getAnimalCount().'"'); } ?>><br><br>
    <label for="feedingTime">Rough Feeding Time:</label>
    <input type="time" name="feedingTime" id="feedingTime" <?php if(isset($setMonitor)){ echo('value="'.$formattedTime.'"'); } ?>><br><br>
    <label for="animalType">Critter Type: </label>
    <select name="animalType" id="animalType">
        <?php foreach($critters as $critter): ?>
            <option value="<?php  echo$critter->getId(); ?>" <?php if(isset($setMonitor)){if($setMonitor->getAnimalType() == $critter->getId()){echo'selected';}} ?>> <?php echo($critter->getID().": ".$critter->getDescription());?></option> 
        <?php endforeach; ?>
    </select><br><br>
    <label for="location">Location where Critters are Kept (OPTIONAL):</label>
    <input type="text" name="location" id="location" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getLocation().'"'); } ?>><br><br>
    <label for="notes">Notes of/for Critters:</label>
    <input type="text" name="notes" id="notes" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getNotes().'"'); } ?>><br><br>
    <label for="feedType">Critter Feed Type (OPTIONAL):</label>
    <input type="text" name="feedType" id="feedType" <?php if(isset($setMonitor)){ echo('value="'.$setMonitor->getFeedType().'"'); } ?> maxlength="28"><br><br><br>
    <input type="submit" value="Submit"><br><br><br>
</fieldset>

</fieldset>
</form>