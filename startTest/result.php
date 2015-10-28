<?php

include_once("../defines.php");
require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDau.php";


$questionDao = new QuestionDaoImpl();
$answerDao = new AnswerDaoImpl();

$countQuestions = count($questionDao->getAllQuestions());
$result =0;

for($i = 0; $i< $countQuestions*5; $i++){

    if(isset($_POST[$i]) && $_POST[$i]==1){

        $result++;
    }
}

    echo "Правильильных ответов : ". $result ;

?>
<br><a href="../view.php">Если хочешь добавить вопрос в тест, жми сюда=) </a>
