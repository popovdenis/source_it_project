<?php
header("Content-type: text/html; charset=utf-8");

include_once("../defines.php");
require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDau.php";

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
    foreach ($questionDao->getAllQuestions() as $key1 => $val1) {

        echo "<tr>";

        echo "<td>";
        print $val1->getQuestion();
        echo "<br>";
        echo "</td>";

        echo "<td>";

        foreach ($questionDao->getAnswersByQuestion($val1->getId()) as $val2) {

            $countWrightAnswers++;

            echo "<input type='checkbox' name = '$countWrightAnswers' value='1' id='.$val2->getId().'>";
            echo "<label for='.$val2->getId().'>";
            print $val2->getAnswer();
            echo "<br>";
            echo "</label><Br>";

        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table><br> ";
    echo "<input type='submit' value='Узнать результат' ></form>";
}


