<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/QuestionDaoImpl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/AnswerDauImpl.php";

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

//print_r( $answerDao->getAllAnswers());   //получить список ответов

//echo $answerDao->updateAnswer(22,"yyyyy");  //обновить ответ

//echo $answerDao->deleteAnswer(21);  // удалить ответ
