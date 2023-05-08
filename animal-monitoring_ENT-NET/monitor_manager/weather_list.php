<!-- ADMIN ONLY -->
<div id="admin-data">
    <table>
        <tr>
            <th>Relay ID:</th>
            <th>City:</th>
            <th>State:</th>
            <th>Zip:</th>
            <th>Fahrenheit:</th>
            <th>Celsius:</th>
            <th>Alert:</th>
            <th>Time Checked:</th>
        </tr>
    <?php foreach ($weatherRelays as $setRelay) : ?>
        <tr>
            <td><?php echo $setRelay->getRelayID(); ?></td>
            <td><?php echo $setRelay->getCity(); ?></td>
            <td><?php echo $setRelay->getState(); ?></td>
            <td><?php echo $setRelay->getZip(); ?></td>
            <td><?php echo $setRelay->getDegrees(); ?></td>
            <td><?php echo round(((doubleval($setRelay->getDegrees()) - 32 ) * (5/9)), 2); ?></td>
            <td><?php echo $setRelay->getExpectedAlert(); ?></td>
            <td><?php echo $setRelay->getTimeDateChecked(); ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
</div>
