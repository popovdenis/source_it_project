<?php
include 'funcs.php';
if (!empty($_POST['f_name']) and !empty($_POST['l_name']) and
    !empty($_POST['email']) and !empty($_POST['pass'])
) {
    $firs_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $phone = (!empty($_POST['phone'])) ? $_POST['phone'] : " ";
    $user = new User($firs_name, $last_name, $email, $pass, $phone);
    $result = $user->postUser('localhost', 'root', '', 'new_user_db');
    // $user->deleteUser('localhost', 'root', '', 'new_user_db', 'qaweeds@gmail.com');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>add user to db</title>
</head>
<body>
<a href="users.php">К списку пользователей</a>

<form name="add_form" action="" method="post">
    <h2>Введите данные дял добавления</h2>

    <p>First name</p>
    <input type="text" name='f_name'>

    <p>Last name</p>
    <input type="text" name='l_name'>

    <p>Email</p>
    <input type="text" name='email'>

    <p>Password</p>
    <input type="password" name='pass'>

    <p>Phone</p>
    <input type="text" name='phone'>
    <p><input type="submit"></p>
</form>
<?php
if (isset($result)) {
    echo ($result == 1) ? "Пользователь успешно добавлен." : 'Пользователь с таким эмеилом уже зарегистрирован!';
}

?>
</body>
</html>