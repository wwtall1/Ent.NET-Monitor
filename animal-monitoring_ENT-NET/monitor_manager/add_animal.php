<form action="monitor_manager/index.php" method="post">
<input type="hidden" readonly name="controllerRequest" value="add_animal">
<!-- ADMIN ONLY -->

<fieldset>
    <legend>Add Animal Type</legend>
    <label for='type'>Animal Type/Common Name</label>
    <input type="text" name="type" id="type" value=""><br><br>
    <br><br>
    <label for='food'>Recommended Food: </label>
    <input type="text" name="food" id="food" value=""><br><br>
    
    <input type="submit" value="Submit"><br><br><br>
</fieldset>
</form>