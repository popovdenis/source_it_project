<?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
if (isset($_POST['role']) && !empty($_POST['role'])&&isset($_GET['edit'])) {
    echo $role->putRole('role', $_GET['edit'],$_POST['role']);
} else {
    echo '<center><b>'."Заполните поле".'</b></center>';
}
?>
<body bgcolor="#ffe4b5">
<center>
    <form action="" method="post">
        Role:<input name="role" type="text" value="<?php echo $_GET['role'];?>">
        <input name="add" type="submit" value="Обновить">
    </form>
    <a href='table.php'>Список ролей</a>
</center>
</body>
