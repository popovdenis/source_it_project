<?php
include 'funcs.php';
session_start();
if (isset($_SESSION['user']) and !empty($_SESSION['user'])) {
    $id = $_SESSION['user'][0];
    $name = $_SESSION['user'][1];
    $last_name = $_SESSION['user'][2];
    $email = $_SESSION['user'][3];
    $phone = $_SESSION['user'][5];
} else {
    die('Что-то пошло не так. :(');
}
if (!empty($_POST['f_name']) and !empty($_POST['l_name']) and
    !empty($_POST['email']) and !empty($_POST['pass'])
) {
    $firs_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = (!empty($_POST['phone'])) ? $_POST['phone'] : " ";
    $user = new User();
    $user->setUser($firs_name, $last_name, $email, $pass, $phone);
    $res = $user->putUser($id);
    if ($res) {
        session_destroy();
        header("Location: users.php");
    }
    // $user->deleteUser('localhost', 'root', '', 'new_user_db', 'qaweeds@gmail.com');
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit user</title>
</head>
<body>
<a href="users.php">К списку пользователей</a>

<form name="add_form" action="" method="post">
    <h2>Введите данные дял редактирования</h2>

    <p>First name</p>
    <input type="text" name='f_name' value="<?= $name ?>">

    <p>Last name</p>
    <input type="text" name='l_name' value="<?= $last_name ?>">

    <p>Email</p>
    <input type="text" name='email' value="<?= $email ?>">

    <p>Password</p>
    <input type="password" name='pass'>

    <p>Phone</p>
    <input type="text" name='phone' value="<?= $phone ?>">

    <p><input type="submit" name="ок"></p>
</form>
</body>
<?php
if (isset($res)) {
    echo ($res == 1) ? " " : 'Обновление данных не удалось';
}
?>
</html>