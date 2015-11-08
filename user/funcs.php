<?php
include_once "../_autoload.php";

/**
 *
 */
class User extends DataBase
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $phone;

    public function setUser($f_name, $l_name, $email_, $pass, $phone_ = '')
    {
        $this->firstname = $f_name;
        $this->lastname = $l_name;
        $this->email = $email_;
        $this->password = $pass;
        $this->phone = $phone_;
    }

    public function check_email()
    {
        $query = "SELECT id FROM user WHERE email = :email";
        $this
            ->prepare($query)
            ->bindValue(':email', $this->escape($this->email))
            ->execute();

        $res = $this->fetchAll();

        return $res;
    }

    public function getUser($id)
    {
        $query = "SELECT * FROM `user` WHERE `id` = :id";
        $this
            ->prepare($query)
            ->bindValue(':id', $this->escape($id), DataBase::PARAM_INT)
            ->execute();

        return $this->fetchRow();
    }

    public function getUsers($order = 'id', $param = false)
    {
        $sql = ($param) ? "SELECT * FROM user ORDER BY :order DESC"
            : "SELECT * FROM user ORDER BY :order";

        $this
            ->prepare($sql)
            ->bindValue(':order', $this->escape($order))
            ->execute();

        return $this->fetchAll();
    }

    public function postUser()
    {
        $checked = $this->check_email();
        if (!$checked) {
            $sql = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`, `phone`, `created_at`)
                VALUES(:firstname, :lastname, :email, :password, :phone, :created_at)";

            $this
                ->prepare($sql)
                ->bindValue(':firstname', $this->escape($this->firstname))
                ->bindValue(':lastname', $this->escape($this->lastname))
                ->bindValue(':email', $this->escape($this->email))
                ->bindValue(':password', $this->escape($this->password))
                ->bindValue(':phone', $this->escape($this->phone))
                ->bindValue(':created_at', (new DateTime())->format('Y-m-d H:i:s'))
                ->execute();

            return true;
        } else {
            return false;
        }
    }

    public function putUser($id)
    {
        $sql = "UPDATE user
            SET firstname = :firstname,
                lastname = :lastname,
                email = :email,
                password = :password,
                phone = :phone
            WHERE id = :id";
    
        $this
            ->prepare($sql)
            ->bindValue(':firstname', $this->escape($this->firstname))
            ->bindValue(':lastname', $this->escape($this->lastname))
            ->bindValue(':email', $this->escape($this->email))
            ->bindValue(':password', $this->escape($this->password))
            ->bindValue(':phone', $this->escape($this->phone))
            ->bindValue(':id', $this->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $this
            ->prepare($sql)
            ->bindValue(':id', $this->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function getUserRole($id)
    {
        $sql = "SELECT role FROM user WHERE id = :id";
        $this
            ->prepare($sql)
            ->bindValue(':id', $this->escape($id), DataBase::PARAM_INT)
            ->execute();

        return $this->fetchAll();
    }
}

$user_arr = array(
    'id',
    'firstname',
    'lastname',
    'email',
    'phone',
    'created_at'
); //массив для сортировки

?>