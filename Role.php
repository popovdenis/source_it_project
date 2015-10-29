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
include "MyiDB.php";

class Role
{
    /**
     * @var mysqli
     */
    public static $db = null;
    public $role;

    public function  __construct()
    {
        self::$db = MyiDB::getInstance()->getConnection();
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
        $result = mysqli_query(self::$db, $sql);
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
        $role = mysqli_escape_string(self::$db, $role);
        $sql = mysqli_query(self::$db, "INSERT INTO $table (`role`)
VALUES ('$role')");
        if ($sql) {
            return '<center>Данные успешно сохранены</center>';
        } else {
            return '<center>Данные не сохранены</center>';
        }
    }

    public function putRole($table, $id, $role)
    {
        $role = $this->del_gaps($role);
        $role = $this->del_tags($role);
        $role = mysqli_escape_string(self::$db, $role);
        $sql = mysqli_query(self::$db, "UPDATE $table SET role='$role' WHERE id='$id'");
        if ($sql) {
            return '<center>Данные успешно обновлены</center>';
        } else {
            return '<center>Данные не обновлены</center>';
        }
    }

    public function deleteRole($table, $id)
    {
        return $sql = mysqli_query(self::$db, "DELETE FROM $table WHERE id=$id");
    }

    public function getUsersByRole($tbl_name, $id)
    {
        $sql = "SELECT `user` FROM $tbl_name WHERE id='$id'";
        $result = mysqli_query(self::$db, $sql);
        if (!$result) {
            return false;
        } else {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $row;
        }
    }

    public function close()
    {
        return mysqli_close(self::$db);
    }
}
