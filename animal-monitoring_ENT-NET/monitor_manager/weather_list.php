<table>
    <tr>
        <th>Relay ID:</th>
        <th>City:</th>
        <th>State:</th>
        <th>Zip:</th>
        <th></th>
    </tr>
<?php foreach ($weatherRelays as $setRelay) : ?>
    <tr>
        <td><?php echo $setRelay->getRelayID(); ?></td>
        <td><?php echo $setRelay->getCity(); ?></td>
        <td><?php echo $setRelay->getState(); ?></td>
        <td><?php echo $setRelay->getZip(); ?></td>
        <td><p>Delete Relay; only get new Relays when needed </p></td>
    </tr>
<?php endforeach; ?>
</table>
