<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/model/Question.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/connectionManager/DB_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/QuestionsDao.php";

/**
 * @author Maria Ostashevskaya
 */
class QuestionDaoImpl implements QuestionsDao
{

    public function getQuestion($id)  //получить вопрос
    {

        $sql = "SELECT `question` FROM `question` WHERE `id` = '$id'";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $question = null;
        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
            $text = $row[1];
            $question = new Question($id, $text);
        }
        return $question;
    }

    public function getAllQuestions()  //получить список вопросов
    {
        $sql = "SELECT `question` FROM `question`";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $questions = null;
        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
            $text = $row[1];

            $questions[] = new Question($id, $text);
        }
        return $questions;
    }

    public function saveQuestion($question) //сохранить вопрос
    {
        $sql = "INSERT INTO `question` (`question`)VALUES ('$question')";
        $query = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query) {
            return "вопрос сохранён! ";
        } else {
            return "ошибка при сохранении вопроса! ";
        }
    }

    public function updateQuestion($id, $question)  //обновить вопрос
    {
        $sql = "UPDATE `question` SET `question`.`question`= '$question' WHERE `question`.`id` IN('$id')";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "вопрос обновлён! ";
        } else {
            return "ошибка при обновлении вопроса! ";
        }
    }

    public function deleteQuestion($id)// удалить вопрос
    {
        $sql = "DELETE FROM  `question` WHERE `id`='$id'";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "вопрос № $id удалён! ";
        } else {
            return "ошибка при удалении вопроса! ";
        }
    }

    public function getAnswersByQuestion($id)//получить список ответов на вопрос
    {
        $sql = "SELECT `answer` FROM `answer`
        INNER JOIN `question_answer`
        ON `answer`.`id` = `question_answer`.`answer_id`
        INNER JOIN `question`
        ON `question`.`id` = `question_answer`.`question_id`
        WHERE `question_id`='$id';";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query_result) {

            $arrResult = null;

            while ($row = mysqli_fetch_array($query_result)) {
                $id = $row[0];
                $text = $row[1];

                $arrResult[] = new Answer($id, $text);
            }
            return  $arrResult;
        }
    }

    public function getQuestionId($question)
    {
        $sql = "SELECT `id` FROM `question` WHERE `question`='$question'";

        $id = null;
        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
        }
        return $id;
    }

    public function answersQuestion($answers_id, $question_id)
    {
        $sql = "INSERT INTO `question_answer` (`answer_id`,`question_id`) VALUES ('$answers_id','$question_id')";
        $query = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query) {
            return " Ответы на вопрос сохранены!";
        } else {
            return " error ";
        }
    }
}