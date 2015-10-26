<?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ROLE</title>
</head>
<body>
<a href="forma.php">Добавить роль</a>
<center><h1>Role</h1></center>
<table border="1" width="100%">
    <tr>
        <th>role</th>
    </tr>
    <?php
    foreach($role->getRoles('role') as $val) {
        echo '<tr><td>' .$val['role']."<a href='forma.php'><img src='icon/redact.jpg' style='float:right' width='20'><a href=".$role->deleteRole()."></a><img src='icon/delete.jpg' style='float:right' width='20'></a></td></tr>";
    }
    ?>
</table>
</body>
</html>