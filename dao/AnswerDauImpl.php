<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/model/Answer.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/connectionManager/DB_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/dao/AnswersDao.php";

/**
 * @author Maria Ostashevskaya
 */
class AnswerDaoImpl implements AnswersDao
{

    public function getAnswer($id)  //получить ответ
    {

        $sql = "SELECT `answer` FROM `answer` WHERE `id` = '$id'";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $answer = null;
        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
            $text = $row[1];
            $answer = new Answer($id, $text);
        }
        return $answer;
    }

    public function getAllAnswers()  //получить список ответов
    {
        $sql = "SELECT `answer` FROM `answer`";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $answers = null;
        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
            $text = $row[1];

            $answers[] = new Answer($id, $text);
        }
        return $answers;
    }

    public function saveAnswer($answer) //сохранить ответ
    {

        $sql = "INSERT INTO `answer` (`answer`) VALUES ('$answer')";
        $query = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query) {
            return " ответ сохранён! ";
        } else {
            return "ошибка при сохранении  ответа! ";
        }

    }

    public function updateAnswer($id, $answer)  //обновить ответ
    {
        $sql = "UPDATE `answer` SET `answer`.`answer`= '$answer' WHERE `answer`.`id` IN('$id')";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "вопрос обновлён! ";
        } else {
            return "ошибка при обновлении вопроса! ";
        }
    }

    public function getAnswerId($answer)
    {
        $sql = "SELECT `id` FROM `answer` WHERE `answer`='$answer'";

        $id = null;
        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
        }
        return $id;
    }

    public function deleteAnswer($id)// удалить ответ
    {
        $sql = "DELETE FROM  `answer` WHERE `id`='$id'";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "ответ № $id удалён! ";
        } else {
            return "ошибка при удалении ответа! ";
        }
    }
}