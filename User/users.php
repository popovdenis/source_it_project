<?php
include_once "../_autoload.php";
include BASE_DIR.'user/funcs.php';
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
    <script type="text/javascript" src="../assets/js/jquery-1.11.1.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"
          href="../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
</head>
<body>
<div class="content-wrapper">
    <div class="container">
        <div class='wait-bar'></div>
        <div class="row">
            <div class="pull-left">
                <a class="btn btn-default add_link" href="index.php"><i
                        class="fa fa-pencil"></i>Добавить нового
                    пользователя</a>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table
                        class="table table-striped table-bordered table-hover users_table">
                        <tr>
                            <th class="wpr7 align-c"
                                onclick="location.href='?sort=0'">ID
                            </th>
                            <th class="wpr10 align-c"
                                onclick="location.href='?sort=1'">Name
                            </th>
                            <th class="align-c"
                                onclick="location.href='?sort=2'">Last Name
                            </th>
                            <th class="align-c"
                                onclick="location.href='?sort=3'">Email
                            </th>
                            <th class="wpr10 align-c"
                                onclick="location.href='?sort=4'">Phone
                            </th>
                            <th class="align-c"
                                onclick="location.href='?sort=5'">Created at
                            </th>
                            <th class="align-c">Action</th>
                        </tr>
                        <?php
                        foreach ($res as $value) {
                            ?>
                            <tr>
                                <td class="align-c"><?= $value['id'] ?></td>
                                <td><?= $value['firstname'] ?></td>
                                <td><?= $value['lastname'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $value['created_at'] ?></td>
                                <td class="align-c">
                                    <a class="btn btn_del mr10"
                                       href="?deluser='<?= $value['id'] ?>'"
                                        >Удалить</a>
                                    <a class="btn btn-primary mr10"
                                       href="?reduser='<?= $value['id'] ?>'"
                                        >Редактировать</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="../assets/js/users.js"></script>

