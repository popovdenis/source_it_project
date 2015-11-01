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
    public $role;

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
        $sql = "SELECT * FROM $tbl_name";
        if (isset($options['order_by'])) {
            $sql .= " ORDER BY id" . $this->database->escape($options['order_by']);
            if (isset($options['order_as'])) {
                $sql .= "ORDER BY DESC id" . $this->database->escape($options['order_as']);
            }
        }
         $this->database->execute($sql);
        $row = $this->database->fetchAll();
        return $row;
    }

    public function postRole($table, $role)
    {
        $sql ="INSERT INTO $table (`role`)
VALUES ('" . $this->database->escape($role) . "')";
        $this->database->execute($sql);
        return 'Данные успешно сохранены';
    }

    public function putRole($table, $id, $role)
    {
        $sql = "UPDATE $table SET role='" . $this->database->escape($role) . "' WHERE id='$id'";
        $this->database->execute($sql);
        return 'Данные успешно обновлены';
    }

    public function deleteRole($table, $id)
    {
         $sql = "DELETE FROM $table WHERE id=$id";
         $this->database->execute($sql);
        return true;
    }

    public function getUsersByRole($tbl_name, $id)
    {
        $sql = "SELECT `user` FROM $tbl_name WHERE id='$id'";
       $this->database->execute($sql);
        $row = $this->database->fetchAll();
        return $row;
    }
}
//
//$role=new Role();
//$role->getRoles('role');