<?php

include_once("defines.php");

require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDau.php";

/**
 * test
 */
$questionDao = new QuestionDaoImpl();

$answerDao = new AnswerDaoImpl();

//echo $answerDao->getAnswerId('fh');// получить id ответа

//print_r($questionDao->getAllQuestions()); //получить список вопросов

//echo $questionDao->updateQuestion(11,"rrrrrrrrrrrr");   //обновить вопрос

//echo $questionDao->deleteQuestion(11);   // удалить вопрос

//print_r($questionDao->getAnswersByQuestion(13));  //получить список ответов на вопрос
foreach($questionDao->getAnswersByQuestion(13) as $val ){
    print $val->getAnswer();
}
//print_r( $answerDao->getAllAnswers());   //получить список ответов

//echo $answerDao->updateAnswer(22,"yyyyy");  //обновить ответ

//echo $answerDao->deleteAnswer(21);  // удалить ответ
