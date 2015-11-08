<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../res/css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../res/css/style.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../res/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../res/js/materialize.min.js"></script>
</head>
<body class="deep-orange lighten-5">

<nav>
    <div class="nav-wrapper red lighten-1">
        <a href="#" class="brand-logo right">Online-test</a>
        <ul class="left">
            <li><a href="../startTest/index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <?php
    /**
     * Add question and answers in DB.
     */

    include_once("../defines.php");
    require_once BASE_DIR . "/dao/ImplQuestionDao.php";
    require_once BASE_DIR . "/dao/ImplAnswerDao.php";

    $currentQuestion;

    $newQuestion = new QuestionDaoImpl();

    if (isset($_POST['question']) && !empty($_POST['question'])) {
        $question = $_POST['question'];

        echo $newQuestion->saveQuestion($question);
        $currentQuestion = $newQuestion->getQuestionId($question);

    } else {
        echo "<h6  class=' cyan-text text-darken-3 '>Введие вопрос.</h6>";
    }
    if (isset($_POST['answer_a']) && !empty($_POST['answer_a'])) {
        $answer_a = $_POST['answer_a'];
        $trueAnswer = 0;
        if ($_POST['wrightAnswer_a'] == 1) {
            $trueAnswer = 1;
        }

        $newAnswer = new AnswerDaoImpl();
        $newAnswer->saveAnswer($answer_a, $trueAnswer);

        echo $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_a), $currentQuestion);
    } else {
        echo "<h6  class=' cyan-text text-darken-3 '>Введите хотя бы один вариант ответа.</h6>";
    }
    if (isset($_POST['answer_b']) && !empty($_POST['answer_b'])) {
        $answer_b = $_POST['answer_b'];
        $trueAnswer = 0;
        if ($_POST['wrightAnswer_b'] == 1) {
            $trueAnswer = 1;
        }

        $newAnswer = new AnswerDaoImpl();
        $newAnswer->saveAnswer($answer_b, $trueAnswer);
        $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_b), $currentQuestion);
    }

    if (isset($_POST['answer_c']) && !empty($_POST['answer_c'])) {
        $answer_c = trim(strip_tags($_POST['answer_c']));
        $trueAnswer = 0;
        if ($_POST['wrightAnswer_c'] == 1) {
            $trueAnswer = 1;
        }

        $newAnswer = new AnswerDaoImpl();
        $newAnswer->saveAnswer($answer_c, $trueAnswer);
        $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_c), $currentQuestion);
    }

    if (isset($_POST['answer_d']) && !empty($_POST['answer_d'])) {
        $answer_d = trim(strip_tags($_POST['answer_d']));
        $trueAnswer = 0;
        if ($_POST['wrightAnswer_d'] == 1) {
            $trueAnswer = 1;
        }

        $newAnswer = new AnswerDaoImpl();
        $newAnswer->saveAnswer($answer_d, $trueAnswer);
        $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_d), $currentQuestion);
    }

    if (isset($_POST['answer_e']) && !empty($_POST['answer_e'])) {
        $answer_e = trim(strip_tags($_POST['answer_e']));
        $trueAnswer = 0;
        if ($_POST['wrightAnswer_e'] == 1) {
            $trueAnswer = 1;
        }

        $newAnswer = new AnswerDaoImpl();
        $newAnswer->saveAnswer($answer_e, $trueAnswer);
        $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_e), $currentQuestion);
    }
    ?>

    <div class="collection col l6">
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal' href="view.php">
            <i class='material-icons left'>input</i>
            Если хочешь добавить вопрос в тест, жми сюда=)
        </a>
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal'
           href="../startTest/index.php">
            <i class='material-icons left'>replay</i>
            Начать тест!
        </a>
    </div>

</div>
</body>
</html>