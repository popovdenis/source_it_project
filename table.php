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
<center><h1>Role</h1></center>
<table border="1" width="100%">
    <tr>
        <th>№</th>
        <th>role</th>
    </tr>
    <?php

    ?>
</table>
</body>
</html>