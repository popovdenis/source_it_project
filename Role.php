<?php

/**
 * 1. Создать класс Role
 * a. DB таблица role.
 * b. Поля DB таблицы
 * id ­ int, 5, primary key, autoincrement,
 * role ­ varchar, 20
 * c. Сущности
 * role
 * d. Методы
 * getRole ­ получить роль
 * getRoles ­ получить список ролей
 * postRole ­ сохранить роль
 * putRole ­ обновить роль
 * deleteRole ­ удалить роль
 * getUsersByRole ­ получение списка пользователей по роли
 */
class Role
{
    public $role;

    private function connect()
    {
        $config = $this->config();
        if (!empty($config)) {
            $link = mysqli_connect($config['host'], $config['username'], $config['password']);
            if (!$link) {
                echo("Не удалось подключиться: " . mysqli_connect_error());
                exit();
            } else {
                $db_selected = mysqli_select_db($link, $config['database']);
                if (!$db_selected) {
                    echo("База данных progect не найдена ");
                    exit();
                }
                return $link;
            }
        }
    }

    private function config()
    {
        $config = parse_ini_file("config.ini");
        return $config;
    }
    private function del_gaps($arr)
    {
        return trim($arr);
    }

    private function del_tags($arr)
    {
        return strip_tags($arr);
    }

    public function setR($arr)
    {
        $this->role = $arr;
    }

    public function getRole()
    {
        $this->role;
    }
    public function getRoles($tbl_name)
    {
        $sql = "SELECT * FROM $tbl_name";
        $result = mysqli_query($this->connect(), $sql);
        if (!$result) {
            return false;
        } else {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $row;
        }
    }

    public function postRole($table, $role)
    {
        $role = $this->del_gaps($role);
        $role = $this->del_tags($role);
        $role = mysqli_escape_string($this->connect(), $role);
        $sql = mysqli_query($this->connect(), "INSERT INTO $table (`role`)
VALUES ('$role')");
        if ($sql) {
            return 'Данные успешно сохранены';
        } else {
            return 'Данные не сохранены';
        }
    }

    public function putRole()
    {

    }

    public function deleteRole()
    {

    }

    public function getUsersByRole()
    {

    }
    public function close()
    {
        return mysqli_close($this->connect());
    }
}