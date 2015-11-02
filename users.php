<?php
include 'funcs.php';
$users = new User();
session_start();
if (isset($_GET['sort'])) {
    $sort_by = $_GET['sort'];
    if (isset($_SESSION['get'])) {
        if ($sort_by == $_SESSION['get']) {
            $res = $users->getUsers(
                $user_arr[$sort_by], true
            ); // user_arr - массив для сортировки;
            $_SESSION['get'] = '';
        } else {
            $res = $users->getUsers($user_arr[$sort_by]);
            $_SESSION['get'] = $sort_by;
        }
    } else {
        $res = $users->getUsers($user_arr[$sort_by]);
        $_SESSION['get'] = $sort_by;
    }
} else {
    $res = $users->getUsers();
}

if (isset($_GET['reduser']) and !empty($_GET['reduser'])) {
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
    <script type="text/javascript" src="assets/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="assets/js/users.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class='content'>
    <div class='wait-bar'></div>
    <a href="index.php">Добавить нового пользователя</a>
    <table border="1" width="100%">
        <tr>
            <th onclick="location.href='?sort=0'">ID</th>
            <th onclick="location.href='?sort=1'">Name</th>
            <th onclick="location.href='?sort=2'">Last Name</th>
            <th onclick="location.href='?sort=3'">Email</th>
            <th onclick="location.href='?sort=4'">Phone</th>
            <th onclick="location.href='?sort=5'">Created at</th>
            <th>Action</th>
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
        <?php
        }
        ?>
    </table>
</div>
</body>
</html>
<script type="text/javascript">

    $('table').find('a').click(function (event) {
        $q = $(this).attr('href');
        if (!$q.indexOf('?deluser')) {
            event.preventDefault();
            $url = "users.php" + $q;
            if (confirm('Вы собираетесь удалить пользователя. Подтвердите действие.')) {
                $.ajax({
                    url: $url,
                    beforeSend: function () {
                        $('.wait-bar').css('background-image', 'url(./images/load.gif)');
                    },
                    error: function () {
                        alert('AJAX ERROR');
                    },
                    success: function (data) {
                        $('.wait-bar').css('background-image', 'none');
                        $('body').html(data);
                    }
                });
            }
        } else {
            console.log('red');
        }
    })


</script>