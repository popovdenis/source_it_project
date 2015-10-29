<?php

include_once("../defines.php");
require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDao.php";


$questionDao = new QuestionDaoImpl();
$answerDao = new AnswerDaoImpl();

$countQuestions = count($questionDao->getAllQuestions());//колличество вопросов
$result = 0;

$countTrueAnswer = count($answerDao->getAllAnswers());//колличество правильных ответов

for ($i = 0; $i < $countQuestions * 5; $i++) {

    if (isset($_POST[$i]) && $_POST[$i] == 1) {

        $result++;
    }
}

echo "Правильильных ответов : " . $result ." из ". $countTrueAnswer;

?>
<br><br><a href="../view.php">Если хочешь добавить вопрос в тест, жми сюда=) </a>

<br><br><a href="index.php"> Начать тест заново! </a>
