<?php
include "DataBase.php";

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
    private $created_at = "NOW()";

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
        $sql = "SELECT id FROM user WHERE email = '$this->email'";
        $this->execute($sql);
        $res = $this->fetchAll();

        return $res;
    }


    public function getUser($id)
    {
        $sql = "SELECT * FROM user WHERE id = $id";
        $this->execute($sql);
        $user = $this->fetchAll();

        return $user[0];
    }

    public function getUsers($order = 'id', $param = false)
    {

        $sql = ($param) ? "SELECT * FROM user ORDER BY $order DESC"
            : "SELECT * FROM user ORDER BY $order";
        $this->execute($sql);
        while ($res = mysqli_fetch_array($this->result, MYSQLI_ASSOC)) {
            $arr[] = $res;
        }

        return $arr;
    }

    public function postUser()
    {
        $checked = $this->check_email();
        if (!$checked) {
            $sql
                = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`, `phone`, `created_at`) VALUES('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->phone', $this->created_at)";
            $res = $this->execute($sql);

            return $this->result;
        } else {
            return false;
        }
        // $checked = $this->check_email('localhost', 'root', '', 'new_user_db', $this->email);
        // if($checked)
        // {
        //     $link = mysqli_connect($serv, $user, $pass, $db);
        //     $sql = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`, `phone`, `created_at`) VALUES('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->phone', $this->created_at)";
        //     $res = mysqli_query($link, $sql);
        //     mysqli_close($link);
        //     return $res;
        // }else
        // {
        //     return false;
        // }

    }

    public function putUser($id)
    {
        $sql
            = "UPDATE user SET firstname='$this->firstname', lastname='$this->lastname', email= '$this->email', password='$this->password', phone='$this->phone' WHERE id =$id";
        $this->execute($sql);

        return $this->result;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = $id";
        $this->execute($sql);

        return $this->result;
    }

    public function getUserRole($id)
    {
        $sql = "SELECT role FROM user WHERE id = $id";
        $this->execute($sql);
        $role = $this->fetchAll();

        return $role;
    }
}

$user_arr = array('id', 'firstname', 'lastname', 'email', 'phone',
                  'created_at'); //массив для сортировки

?>