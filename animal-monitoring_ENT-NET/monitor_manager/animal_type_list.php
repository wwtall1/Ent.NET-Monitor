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
        <td><p> Edit/Delete AnimalType </p></td>
    </tr>
<?php endforeach; ?>
</table>