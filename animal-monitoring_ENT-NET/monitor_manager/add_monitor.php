


<form action="monitor_manager/index.php" method="post">
<input type="hidden" readonly name="controllerRequest" value="add_monitor">
<!--add admin-only option for ID, so an Admin can choose what User gets the Monitor. Maybe a text input; get max ID, 
possible list/SELECT to find what User has what ID? Maybe have the SELECT auto-fill the ID? -->
<fieldset id="metaField">
    <label for='userId'>User ID: </label>
    <input type="text" name="userId" id="userId" <?php if(isset($_SESSION['user_ID'])){ echo'value=""'; echo$_SESSION['user_ID'];}else{ echo "value='1'";} ?>>
<fieldset id='foodSide'>
    <legend>Food Dish Setup</legend>
    <label for='foodFull'>Weight when Full (Pounds): </label>
    <input type="text" name="foodFull" id="foodFull" value=""><br><br>
    <br><br>
    <label for='foodEmpty'>Weight when Empty: </label>
    <input type="text" name="foodEmpty" id="foodEmpty" value=""><br><br>
    <label for="foodAlert">Alert at Percent:</label>
    <input type="number" name="foodAlert" id="foodAlert" value="25" max="100">
    <br><br>
</fieldset>
<fieldset id='waterSide'>
    <legend>Water Dish Setup</legend>
    <label for='waterFull'>Weight when Full (Pounds): </label>
    <input type="text" name="waterFull" id="waterFull" value=""><br><br>
    <br><br>
    <label for='waterEmpty'>Weight when Empty: </label>
    <input type="text" name="waterEmpty"id="waterEmpty" value=""><br><br>
    <label for="waterAlert">Alert at Percent:</label>
    <input type="number" name="waterAlert" id="waterAlert" value="25" max="100">
    <br><br>
</fieldset>
<fieldset id="critterSide">
    <legend>Critter Info: </legend>
    <label for="animalCount">Critter Count:</label>
    <input type="text" name="animalCount" id="animalCount"><br><br>
    <label for="feedingTime">Rough Feeding Time:</label>
    <input type="time" name="feedingTime" id="feedingTime"><br><br>
    <label for="animalType">Critter Type: </label>
    <select name="animalType" id="animalType">
        <?php foreach($critters as $critter): ?>
            <option value="<?php  echo$critter->getId(); ?>"> <?php echo$critter->getID(); echo ": "; echo $critter->getDescription();?></option> 
        <?php endforeach; ?>
    </select><br><br>
    <label for="location">Location where Critters are Kept (OPTIONAL):</label>
    <input type="text" name="location" id="location"><br><br>
    <label for="notes">Notes of/for Critters:</label>
    <input type="text" name="notes" id="notes"><br><br>
    <label for="feedType">Critter Feed Type (OPTIONAL):</label>
    <input type="text" name="feedType" id="feedType" maxlength="28"><br><br><br>
    <input type="submit" value="Submit"><br><br><br>
</fieldset>

</fieldset>
</form>