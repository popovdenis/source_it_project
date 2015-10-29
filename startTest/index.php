<?php
header("Content-type: text/html; charset=utf-8");

include_once("../defines.php");
require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDao.php";

if (!isset($_POST['test'])) {
    $title = 'Пройдите тест!'; ?>
    <h3><?php echo $title; ?></h3>
    <form action="" method="post">
        <input type="hidden" name="test">
        <input type="submit" value="Начать тест">
    </form>
    <?php
} else {
    $questionDao = new QuestionDaoImpl();
    $answerDao = new AnswerDaoImpl();

    $countWrightAnswers = 0;

    echo " <form action='result.php' method='post'>";
    echo "<table cellpadding='5' cellspacing='0' border='1' width='50%'>";
    foreach ($questionDao->getAllQuestions() as $keyQuestion => $valQuestion) {

        echo "<tr>";

        echo "<td>";
        print $valQuestion->getQuestion();
        echo "<br>";
        echo "</td>";

        echo "<td>";

        foreach ($questionDao->getAnswersByQuestion($valQuestion->getId()) as $valAnswerByQuestion) {

            $countWrightAnswers++;
            $trueOrFalse = $answerDao->getTrueAnswer($valAnswerByQuestion->getId());

            echo "<input type='checkbox' name = '$countWrightAnswers' value='$trueOrFalse' id='$valAnswerByQuestion->getId()'>";

            echo "<label for='.$valAnswerByQuestion->getId().'>";
            print $valAnswerByQuestion->getAnswer();
            echo "<br>";
            echo "</label><Br>";

        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table><br> ";
    echo "<input type='submit' value='Узнать результат' ></form>";
}


