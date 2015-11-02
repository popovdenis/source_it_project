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
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <?php
    header("Content-type: text/html; charset=utf-8");

    include_once("../defines.php");
    require_once BASE_DIR . "/dao/ImplQuestionDao.php";
    require_once BASE_DIR . "/dao/ImplAnswerDao.php";

    if (isset($_POST['test'])) {

        $questionDao = new QuestionDaoImpl();
        $answerDao = new AnswerDaoImpl();

        $countWrightAnswers = 0;

        echo " <form action='result.php' method='post'>";
        echo "<table class='bordered highlight z-depth-2'>";
        foreach ($questionDao->getAllQuestions() as $keyQuestion => $valQuestion) {

            echo "<tr>";

            echo "<td>";
            echo "<span class=' cyan-text text-darken-3 '><b>" . $valQuestion->getQuestion() . "</b></span>";
            echo "<br>";
            echo "</td>";

            echo "<td>";

            foreach ($questionDao->getAnswersByQuestion($valQuestion->getId()) as $valAnswerByQuestion) {

                $countWrightAnswers++;
                $trueOrFalse = $answerDao->getTrueAnswer($valAnswerByQuestion->getId());

                echo "<input type='checkbox' name = '$countWrightAnswers' value='$trueOrFalse' id='$countWrightAnswers'>";

                echo "<label for='$countWrightAnswers'>";
                print $valAnswerByQuestion->getAnswer();
                echo "<br>";
                echo "</label><Br>";

            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table><br> ";

//        echo "<input type='submit' value='Узнать результат' ></form>";

        echo " <button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons left large'>done_all</i> Узнать результат
        </button></form>";
    }
    ?>
    <br><br>
</div>
</body>
</html>