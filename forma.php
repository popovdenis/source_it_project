<script type="text/javascript">
    function valid(form) {
        var fail = false;
        var role1 = form.role.value;
        if (role1 == "" || role1 == " ") {
            fail = "Заполните пустое поле";
        }
        if (fail) {
            alert(fail);
            return false;
        }
        else {
            <?php
include "Role.php";
$role = new Role;
$role->setR($role->getRoles('role'));
if (isset($_POST['role']) && !empty($_POST['role'])) {
    echo $role->postRole('role', $_POST['role']);
}
?>
        }
    }
</script>
<body bgcolor="#ffe4b5">
<center>
    <form action="" method="post" onsubmit="valid(this)">
        Role:<input name="role" type="text">
        <input name="add" type="submit" value="Добавить">
    </form>
    <a href='table.php'>Список ролей</a>
</center>
</body>