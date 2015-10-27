<?php
/**
 * Add question and answers in DB.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/QuestionDaoImpl.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/AnswerDauImpl.php";

$currentQuestion;

$newQuestion = new QuestionDaoImpl();

if (isset($_POST['question']) && !empty($_POST['question'])) {
    $question = $_POST['question'];

    echo $newQuestion->saveQuestion($question);
    $currentQuestion = $newQuestion->getQuestionId($question);

} else {
    echo "Введие вопрос.";
}
if (isset($_POST['answer_a']) && !empty($_POST['answer_a'])) {
    $answer_a = $_POST['answer_a'];

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_a);

    echo $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_a), $currentQuestion);
} else {
    echo "Введие минимум один ответ, заплняя поля ответов сверху вниз.";
}
if (isset($_POST['answer_b']) && !empty($_POST['answer_b'])) {
    $answer_b = $_POST['answer_b'];

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_b);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_b), $currentQuestion);
}
if (isset($_POST['answer_c']) && !empty($_POST['answer_c'])) {
    $answer_c = trim(strip_tags($_POST['answer_c']));

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_c);
     $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_c), $currentQuestion);
}
if (isset($_POST['answer_d']) && !empty($_POST['answer_d'])) {
    $answer_d = trim(strip_tags($_POST['answer_a']));

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_d);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_d), $currentQuestion);
}
if (isset($_POST['answer_e']) && !empty($_POST['answer_e'])) {
    $answer_e = trim(strip_tags($_POST['answer_e']));

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_e);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_e), $currentQuestion);
}

