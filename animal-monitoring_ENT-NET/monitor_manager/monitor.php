
<fieldset id='foodSide'>
    <legend>Food Status</legend>
    <label for='foodPercent'>Food Percentage: </label><br>
    <b id='foodPercent'><?php// echo $setMonitor->getFoodPercent(); ?></b> <!-- Will be Calculated between emptyWeight VS fullWeight in the created Object -->
    <br><br>
    <label for='foodWeight'>Food By Weight: </label><br>
    <b id='foodWeight'><?php// echo $setMonitor->getFoodWeight(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='foodAlertAt'>Alert At Percentage: </label>
    <input type='text' value='20%' id='foodAlertAt' />
    <br><br>
</fieldset>




<fieldset id='waterSide'>
    <legend>Water Status</legend>
    <label for='waterPercent'>Water Percentage: </label><br>
    <b id='waterPercent'><?php// echo $setMonitor->getWaterPercent(); ?></b> <!-- Will be Calculated between emptyWeight VS fullWeight in the created Object -->
    <br><br>
    <label for='waterWeight'>Water By Weight: </label><br>
    <b id='waterWeight'><?php// echo $setMonitor->getWaterWeight(); ?></b> <!-- Will be gotten direct from database -->
    <br><br>
    <label for='waterAlertAt'>Alert At Percentage: </label>
    <input type='text' value='20%' id='waterAlertAt' />
    <br><br>
</fieldset>