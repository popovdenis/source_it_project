<?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
if (isset($_POST['role']) && !empty($_POST['role'])) {
    echo $role->postRole('role', $_POST['role']);
} else {
    echo '<center><b>' . "Заполните поле" . '</b></center>';
}
?>
<body bgcolor="#87cefa">
<center>
    <form action="" method="post">
        Role:<input name="role" type="text">
        <input name="add" type="submit" value="Добавить">
    </form>
    <a href='table.php'>Список ролей</a>
</center>
</body>