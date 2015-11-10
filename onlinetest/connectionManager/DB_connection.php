<?php
class DB_connection
{
    public static function db_connect($hostname = 'localhost', $username = 'root', $password = 'root',
                               $dbName = 'OnlineTest', $port = 3306)
    {
        $connect = mysqli_connect($hostname, $username, $password, $dbName, $port);
        if ($connect) {
            return $connect;
        } else {
            die('Ошибка подключения к серверу баз данных.');
        }
    }
}
