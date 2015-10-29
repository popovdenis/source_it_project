<?php
/**
 * Add question and answers in DB.
 */

include_once("defines.php");
require_once BASE_DIR . "/dao/ImplQuestionDao.php";
require_once BASE_DIR . "/dao/ImplAnswerDao.php";

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
    $trueAnswer = 0;
    if ($_POST['wrightAnswer_a'] == 1) {
        $trueAnswer=1;
    }

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_a,$trueAnswer);

    echo $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_a), $currentQuestion);
} else {
    echo "Введие минимум один ответ, заплняя поля ответов сверху вниз.";
}
if (isset($_POST['answer_b']) && !empty($_POST['answer_b'])) {
    $answer_b = $_POST['answer_b'];
    $trueAnswer = 0;
    if ($_POST['wrightAnswer_b'] == 1) {
        $trueAnswer=1;
    }

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_b,$trueAnswer);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_b), $currentQuestion);
}
if (isset($_POST['answer_c']) && !empty($_POST['answer_c'])) {
    $answer_c = trim(strip_tags($_POST['answer_c']));
    $trueAnswer = 0;
    if ($_POST['wrightAnswer_c'] == 1) {
        $trueAnswer=1;
    }

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_c,$trueAnswer);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_c), $currentQuestion);
}
if (isset($_POST['answer_d']) && !empty($_POST['answer_d'])) {
    $answer_d = trim(strip_tags($_POST['answer_d']));
    $trueAnswer = 0;
    if ($_POST['wrightAnswer_d'] == 1) {
        $trueAnswer=1;
    }

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_d,$trueAnswer);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_d), $currentQuestion);
}
if (isset($_POST['answer_e']) && !empty($_POST['answer_e'])) {
    $answer_e = trim(strip_tags($_POST['answer_e']));
    $trueAnswer = 0;
    if ($_POST['wrightAnswer_e'] == 1) {
        $trueAnswer=1;
    }

    $newAnswer = new AnswerDaoImpl();
    $newAnswer->saveAnswer($answer_e,$trueAnswer);
    $newQuestion->answersQuestion($newAnswer->getAnswerId($answer_e), $currentQuestion);
}
?>
<br><br><a href="view.php">Если хочешь добавить ещё один вопрос в тест, жми сюда=) </a>
<br><br><a href="startTest/index.php"> Начать тест ! </a>