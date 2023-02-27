
<fieldset id='foodSide'>
    <legend>Food Dish Setup</legend>
    <label for='foodFull'>Weight when Full (Pounds): </label><br>
    <input type="text" id="foodFull" value="">
    <br><br>
    <label for='foodEmpty'>Weight when Empty: </label><br>
    <input type="text" id="foodEmpty" value="">
    <br><br>
</fieldset>
<fieldset id='waterSide'>
    <legend>Water Dish Setup</legend>
    <label for='waterFull'>Weight when Full (Pounds): </label><br>
    <input type="text" id="waterFull" value="">
    <br><br>
    <label for='waterEmpty'>Weight when Empty: </label><br>
    <input type="text" id="waterEmpty" value="">
    <br><br>
</fieldset>
<br>
<fieldset id="critterSide">
    <legend>Critter Info: </legend>
    <label for="animalCount">Critter Count:</label>
    <input type="text" id="animalCount">
    <label for="feedingTime">Rough Feeding Time:</label>
    <input type="datetime" id="feedingTime">
    <label for="animalType">Critter Type: </label>
    <select name="animalType" id="animalType">
        <!<!-- Add specific animalType options filled from database! -->       
    </select>
    <label for="location">Location where Critters are Kept (OPTIONAL):</label>
    <input type="text" id="location">
    <label for="notes">Notes of/for Critters:</label>
    <input type="text" id="notes">
    <label for="feedType">Critter Feed Type (OPTIONAL):</label>
    <input type="text" id="feedType" maxlength="28">
    
    
    
</fieldset>