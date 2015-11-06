<?php
include_once "../_autoload.php";
include_once BASE_DIR . "article/article.php";
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
        <?php
$art = new Article();
if (!empty($_POST)) {
    $post1 = $_POST['title_edit'];
    $post2 = $_POST['description_edit'];

    if ($art->putArticle($_GET['id'], $post1, $post2)) {
        header("Location: index.php");
    }
}
?>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Вы нашли ошибку? Редактируйте новость...
                        <div class="pull-right">
                            <a class="btn btn-default" href="index.php">
                                <i class="fa fa-list"></i> Редактируйте форму
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="edit.php?<?php echo $_SERVER['QUERY_STRING'] ?>">
                             <?php
                                 foreach ($art->getArticle($_GET['id']) as $value) {
                                     echo "<input type = 'text' class='form-control' name = 'title_edit' value ='$value[1]'><br >";
                                     echo "<textarea name = 'description_edit' class='form-control' rows = '10'  cols = '45' >$value[2]</textarea ><br >";
                             }?>
                         <input type="submit" name="edit" class="btn btn-default" value="Обновить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
<?php require_once BASE_DIR . "footer.php"; ?>
<!-- FOOTER SECTION END-->

