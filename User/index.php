<?php
include_once "../_autoload.php";

include BASE_DIR . 'user/funcs.php';
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
    $res = $user->postUser();
    if ($res) {
        header("refresh:5;url=users.php");
    }
    // $user->deleteUser('localhost', 'root', '', 'new_user_db', 'qaweeds@gmail.com');
}
include_once BASE_DIR . "header.php" ?>
<body>
<!-- HEADER END-->
<?php require_once BASE_DIR . "header-logo-bar.php"; ?>
<!-- LOGO HEADER END-->
<?php require_once BASE_DIR . "header-menu.php"; ?>
<!-- MENU SECTION END-->
<!DOCTYPE html>
<html>
<head>
    <title>Add new user</title>
</head>
<body>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
<a href="users.php">К списку пользователей</a>

<form name="add_form" action="" method="post">
    <h2>Введите данные для добавления</h2>

    <p>* - required fields</p>

    <p>First name*</p>
    <input type="text" name='f_name'>

    <p>Last name*</p>
    <input type="text" name='l_name'>

    <p>Email*</p>
    <input type="text" name='email'>

    <p>Password*</p>
    <input type="password" name='pass'>

    <p>Phone</p>
    <input type="text" name='phone'>

    <p><input type="submit"></p>
</form>
<?php
if (isset($res)) {
    echo ($res == 1) ? "User has been added successfully.<br>Redirect in 5 sec."
        : 'User has not been added. Email is occupied';
}

?>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
</body>
</html>
