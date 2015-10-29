<?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
if (isset($_GET['del']) && !empty($_GET['del'])) {
    $id = $_GET['del'];
    $role->deleteRole('role', $id);
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ROLE</title>
</head>
<body bgcolor="#ffe4b5">
<a href="forma.php"><img src='icon/add.jpg' alt='Добавить роль' title='Добавить новую роль' style='float:right'
                         width='20'></a>
<center><h1>Role</h1></center>
<table border="1" width="100%">
    <tr>
        <th>role
            <?php
            $r = $role->getRoles('role');
            if (!empty($r)) {
            if (isset($_GET['up']) && !empty($_GET['up'])) {
                arsort($r);
                ?>
                <a href="table.php?down=1">
                    <img src="icon/down.jpg" alt="вниз" title="Сортировать" style="float:left" width="15"></a>
            <?php
            } else {
                ?>
                <a href="table.php?up=1">
                    <img src="icon/up.jpg" alt="вверх" title="Сортировать" style="float:left" width="15"></a>
        </th>
    <?php
    }
    ?>
    </tr>
    <?php
        foreach ($r as $val) {
            echo '<tr><td>' . $val['role'] .
                '<a href="edit.php?edit=' . $val['id'] . '&role=' . $val['role'] . '">
            <img src="icon/redact.jpg" alt="Редактировать роль" title="Редактировать роль" style="float:right" width="20">
            </a>
        <a href="table.php?del=' . $val['id'] . '">
        <img src="icon/delete.jpg" alt="Удалить роль" title="Удалить роль" style="float:right" width="20">
        </a></td></tr>';
        }
    }
    ?>
</table>
</body>
</html>