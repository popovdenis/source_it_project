<?php
class DB_connection
{
    public static function db_connect()
    {
        $config = Config::getConfig();
        $connect = mysqli_connect(
            $config['host'], $config['username'], $config['password'], $config['database'], $config['port']
        );
        $connect->query("SET NAMES 'utf8'");
        if ($connect) {
            return $connect;
        } else {
            die('Ошибка подключения к серверу баз данных.');
        }
    }
}
