<?php
include 'funcs.php';
$users = new User();
$res = $users->getUsers('localhost', 'root', '', 'new_user_db');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Список пользователей</title>
</head>
<body>
<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created at</th>
    </tr>
    <?php
    foreach ($res as $value) {
        ?>
        <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['firstname'] ?></td>
            <td><?= $value['lastname'] ?></td>
            <td><?= $value['email'] ?></td>
            <td><?= $value['phone'] ?></td>
            <td><?= $value['created_at'] ?></td>
        </tr>
    <?
    }
    ?>
</table>
</body>
</html>