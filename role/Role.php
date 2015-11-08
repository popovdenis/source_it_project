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
    /**
     * @var Database
     */
    private $database;

    public  $role;

    public function  __construct()
    {
        $this->database = new DataBase();
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
        $sql = "SELECT * FROM $tbl_name ORDER BY id";
        $this->database
            ->prepare($sql)
            ->execute();

        return $this->database->fetchAll();
    }

    public function postRole($table, $role)
    {
        $sql = "INSERT INTO $table (`role`) VALUES (:role)";
        $this->database
            ->prepare($sql)
            ->bindValue(':role', $this->database->escape($role))
            ->execute();

        return '<center>Данные успешно сохранены</center>';
    }

    public function putRole($table, $id, $role)
    {
        $sql = "UPDATE $table SET role=:role WHERE id=:id";
        $this->database
            ->prepare($sql)
            ->bindValue(':role', $this->database->escape($role))
            ->bindValue(':id', $this->database->escape($id), DataBase::PARAM_INT)
            ->execute();

        return '<center>Данные успешно обновлены</center>';
    }

    public function deleteRole($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $this->database
            ->prepare($sql)
            ->bindValue(':id', $this->database->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function getUsersByRole($tbl_name, $id)
    {
        $sql = "SELECT `user` FROM $tbl_name WHERE id=:id";
        $this->database
            ->prepare($sql)
            ->bindValue(':id', $this->database->escape($id), DataBase::PARAM_INT)
            ->execute();

        return $this->database->fetchAll();
    }
}
//
//$role=new Role();
//$role->getRoles('role');