<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 30.10.2015
 * Time: 20:47
 */
include_once "../_autoload.php";
include BASE_DIR . "role/Role.php";

$roleObj = new Role();
if (isset($_GET['del']) && !empty($_GET['del'])) {
    $id = $_GET['del'];
    $roleObj->deleteRole('role', $id);
}
?>
<?php include_once BASE_DIR . "header.php" ?>
<body>
<!-- HEADER END-->
<?php require_once BASE_DIR . "header-logo-bar.php"; ?>
<!-- LOGO HEADER END-->
<?php require_once BASE_DIR . "header-menu.php"; ?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-default" href="new-role.php">
                    <i class="fa fa-pencil"></i> New Role
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="wpr10 align-c">#</th>
                                <th class="align-c">Role</th>
                                <th class="wpr30 align-c">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
foreach ($roleObj->getRoles('role') as $index => $role) {
?>
                            <tr>
                                <td class="align-c"><?php echo ++$index ?></td>
                                <td><?php echo $role[1] ?></td>
                                <td class="align-c">
                                    <a class="btn btn-primary mr10"
                                       href="edit-role.php?edit=<?php echo $role[0] ?>&role=<?php echo $role[1] ?>">
                                        <i class="fa fa-edit "></i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" href="index.php?del=<?php echo $role[0] ?>">
                                        <i class="fa fa-pencil"></i> Delete
                                    </a>
                                </td>
                            </tr>
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->