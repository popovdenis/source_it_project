<?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
if (isset($_GET['del']) && !empty($_GET['del'])) {
    $id = $_GET['del'];
    $role->deleteRole('role', $id);
    header("Location:table.php");
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ROLE</title>
</head>
<body bgcolor="#87cefa">
<a href="forma.php"><img src='icon/add.jpg' alt='Добавить роль' title='Добавить новую роль' style='float:right'
                         width='20'></a>
<center><h1>Role</h1></center>
<table border="1" width="100%">
    <tr>
        <th>role</th>
    </tr>
    <?php
    $r = $role->getRoles('role');
    if (!empty($r)) {
        foreach ($role->getRoles('role') as $val) {
            echo '<tr><td>' . $val['role'] .
                '<a href="edit.php?edit=' . $val['id'] . '&role=' . $val['role'] . '">
            <img src="icon/redact.jpg" alt="Редактировать роль" title="Редактировать роль" style="float:right" width="20">
            </a>
        <a href="?del=' . $val['id'] . '">
        <img src="icon/delete.jpg" alt="Удалить роль" title="Удалить роль" style="float:right" width="20">
        </a></td></tr>';
        }
    }
    ?>
</table>
</body>
</html>