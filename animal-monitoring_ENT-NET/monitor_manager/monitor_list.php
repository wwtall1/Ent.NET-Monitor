
<body>
    <form action="monitor_manager/index.php" method="post">
    <input type="hidden" readonly name="controllerRequest" value="swap_monitor">
    <select name="setMonitor" id="setMonitor">
        <?php foreach ($monitors as $gottenMonitor) : ?>
                <option value="<?php  echo$gottenMonitor->getID(); ?>"> <?php echo$gottenMonitor->getID(); echo ": "; 
                if($gottenMonitor->getNotes() == null){echo"";}else{echo$gottenMonitor->getNotes();}?> </option> 
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Set Monitor">
    </form><br>
    <div><?php if(!is_null($monitors) && $showMonitors){require("monitor.php");} //get the chosen monitor from the setMonitor select; display via monitor.php ?></div>
</body>