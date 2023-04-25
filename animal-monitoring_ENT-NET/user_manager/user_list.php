<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>E-mail</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>Active</th>
        <th>Edit User</th>
    </tr>
<?php foreach ($users as $user) : ?>
    <tr>
        <td><?php echo $user->getId(); ?></td>
        <td><?php echo $user->getFirstName()." ".$user->getLastName() ?></td>
        <td><?php echo $user->getPhone(); ?></td>
        <td><?php echo $user->getEmail(); ?></td>
        <td><?php echo $user->getAddress(); ?></td>
        <td><?php echo $user->getCity(); ?></td>
        <td><?php echo $user->getState(); ?></td>
        <td><?php echo $user->getZip(); ?></td>
        <td><?php echo $user->getIsActive(); ?></td>
        <td><form action="user_manager/index.php" method="post">
        <input type="hidden" name="controllerRequest" value="edit_user">
        <input type="hidden" name="userID" id="userID" value="<?php echo $user->getId(); ?>">
        <input type="submit" value="Edit User">
        </form></td>
    </tr>
<?php endforeach; ?>
</table>
