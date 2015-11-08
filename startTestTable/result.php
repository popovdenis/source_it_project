<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../res/css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../res/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../res/js/materialize.min.js"></script>
</head>
<body class="deep-orange lighten-5">

<nav>
    <div class="nav-wrapper  red lighten-2">
        <a href="#" class="brand-logo right">Online-test</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="index.php">На главную</a></li>
        </ul>
    </div>
</nav>

<div class="container row">

    <?php

    include_once("../defines.php");
    require_once BASE_DIR . "/dao/ImplQuestionDao.php";
    require_once BASE_DIR . "/dao/ImplAnswerDao.php";


    $questionDao = new QuestionDaoImpl();
    $answerDao = new AnswerDaoImpl();

    $countQuestions = count($questionDao->getAllQuestions());//колличество вопросов
    $result = 0;

    $countTrueAnswer = count($answerDao->getAllAnswers());//колличество правильных ответов

    for ($i = 0; $i <= $countQuestions * 5; $i++) {

        if (isset($_POST[$i]) && $_POST[$i] == 1) {

            $result++;
        }
    }

    echo "<h3 class=' cyan-text text-darken-3 '>Правильных ответов : " . $result . " из " . $countTrueAnswer . "</h3>";

    ?>
    <!--    <br><br><a class=' cyan-text text-darken-1 ' href="../view.php">-->
    <!--        <i class='material-icons left'>input</i>Если хочешь добавить вопрос в тест, жми сюда=) </a>-->
    <!---->
    <!--    <br><br><a class=' cyan-text text-darken-1 ' href="index.php">-->
    <!--        <i class='material-icons left'>replay</i> Начать тест заново! </a>-->


    <div class="collection col l6">
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal' href="../view.php">
            <i class='material-icons left'>input</i>
            Если хочешь добавить вопрос в тест, жми сюда=)
        </a>
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal' href="index.php">
            <i class='material-icons left'>replay</i>
            Начать тест заново!
        </a>
    </div>

</div>
</body>
</html>