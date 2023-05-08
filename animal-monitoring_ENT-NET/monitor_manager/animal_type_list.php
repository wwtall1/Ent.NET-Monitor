<form action="monitor_manager/index.php" method="post">
    <!-- ADMIN ONLY -->
<table>
    <tr>
        <th>Description:</th>
        <th>Recommended Food:</th>
        <th></th>
    </tr>
<?php foreach ($animalTypes as $animalType) : ?>
    <tr>
        <td><?php echo $animalType->getDescription(); ?></td>
        <td><?php echo $animalType->getRecommendedFood(); ?></td>
        <td><input type='hidden' name='controllerRequest' value='delete_animal'>
            <input type='hidden' name='typeID' id="typeID" value='<?php echo $animalType->getId(); ?>'>
            <input type="submit" value="Delete"></td>
    </tr>
<?php endforeach; ?>
</table><br><br>
</form><br><br><br>