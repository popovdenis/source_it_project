<?php
include_once "../_autoload.php";
include BASE_DIR . "role/Role.php";
$roleObj = new Role();
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
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="wpr10 align-c">#</th>
                                <th class="align-c">User</th>
                                <th class="align-c">Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($roleObj->getUsersByRole() as $index => $user) {
                                ?>
                                <tr>
                                    <td class="align-c"><?php echo ++$index ?></td>
                                    <td><?php echo $user[1] ?></td>
                                    <td class="align-c"><?php echo $user[1] ?></td>
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