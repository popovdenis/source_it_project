<?php
include 'funcs.php';
$users = new User();
$res = $users->getUsers();
if (isset($_GET['reduser']) and !empty($_GET['reduser'])) {
    session_start();
    $id = $_GET['reduser'];
    $user_info = $users->getUser($id);
    $_SESSION['user'] = $user_info;
    header("Location: red_user.php");


}
if (isset($_GET['deluser']) and !empty($_GET['deluser'])) {
    $id = $_GET['deluser'];
    $users->deleteUser($id);
    header("Location: users.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Список пользователей</title>
</head>
<body>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Created at</th>
        <th>Правка</th>
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
            <td>
                <a href="?deluser='<?= $value['id'] ?>'"
                   style="display: block;">Удалить</a>
                <a href="?reduser='<?= $value['id'] ?>'"
                   style="display: block;">Редактировать</a>
            </td>
        </tr>
    <?
    }
    ?>
</table>
</body>
</html>