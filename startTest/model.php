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
            <li><a href="index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <?php
//    ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);

    header("Content-type: text/html; charset=utf-8");
    include_once("../defines.php");
    require_once BASE_DIR . "/dao/ImplQuestionDao.php";
    require_once BASE_DIR . "/dao/ImplAnswerDao.php";
    $questionDao = new QuestionDaoImpl();
    $answerDao = new AnswerDaoImpl();

    //    session_set_cookie_params(7200);
    ini_set('session.gc_maxlifetime', 7200);
    session_start();

    $questions = $questionDao->getAllQuestions();
    //    print_r($questions);
    $questionsCounter = 0;
    $countWrightAnswers = 0;

    $answer = $_POST['answer'];

    //            unset($_SESSION['answers']);
    if (!isset($_SESSION['answers'])) {

        $_SESSION['answers'] = [];
        $_SESSION['questionsCounter'] = 0;
    }
    $questionsCounter = $_SESSION['questionsCounter'];

    $_SESSION['answers'][] = $answer;
    $_SESSION['questionsCounter']++;

    if (!isset($questions[$questionsCounter])) {
        header('Location: controller.php');

    }
    $title = $questions[$questionsCounter];

    $countQuestions = count($questionDao->getAllQuestions());//колличество вопросов
    $countTest = round(($questionsCounter * 100) / $countQuestions); ?>

    <p class='cyan-text text-darken-2 right'><b>Пройдено <?php echo $countTest; ?> %</b></p>

    <br><br><h5 class=' cyan-text text-darken-3 '><?php echo $title->getQuestion(); ?></h5>

    <form action="model.php" method="post">
        <br><input type="hidden" name="q" value="<?php echo $questionsCounter; ?>">
        <?php foreach ($questionDao->getAnswersByQuestion($title->getId()) as $valAnswerByQuestion) {

            $countWrightAnswers++;
            $trueOrFalse = $answerDao->getTrueAnswer($valAnswerByQuestion->getId());

            echo "<br><input type='checkbox' name = 'answer[]' value='$trueOrFalse' id='$countWrightAnswers'>";

            echo "<label for='$countWrightAnswers'>";
            print $valAnswerByQuestion->getAnswer();
            echo "<br></label><Br>";

        }
        if (($questionsCounter + 1) == $countQuestions) {
            echo " <Br><Br><button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons left large'>done_all</i> Узнать результат
        </button></form>";
        } else {
            echo " <Br><Br><button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons left large'>done_all</i> Следующий вопрос
        </button></form>";
        }
        ?>
    </form>

</div>
</body>
</html>