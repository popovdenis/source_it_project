<?php

/**
 *
 */
class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $phone;
    private $created_at = "NOW()";

    function __construct($f_name = '', $l_name = '', $email_ = '', $pass = '',
        $phone_ = ''
    ) {
        $this->firstname = $f_name;
        $this->lastname = $l_name;
        $this->email = $email_;
        $this->password = $pass;
        $this->phone = $phone_;
    }
    public function check_email($serv, $user, $pass, $db, $email)
    {   
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql = "SELECT * FROM user WHERE email =  '$email'";
        $row = mysqli_query($link, $sql);
        $res = mysqli_fetch_row($row);
        var_dump($res);
        mysqli_close($link);
        if(!$res){
            return true;
        }else{
            return false;
        }
    }

    public function getUser($serv, $user, $pass, $db, $email)
    {
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql = "SELECT * FROM user WHERE `email` =  $email";
        $row = mysqli_query($link, $sql);
        $res = mysqli_fetch_row($row);
        mysqli_close($link);

        return $res;
    }

    public function getUsers($serv, $user, $pass, $db)
    {
        $arr = array();
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql = "SELECT * FROM user";
        $row = mysqli_query($link, $sql);
        while ($res = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
            $arr[] = $res;
        }
        mysqli_close($link);

        return $arr;
    }

    public function postUser($serv, $user, $pass, $db)
    {
        $checked = $this->check_email('localhost', 'root', '', 'new_user_db', $this->email);
        if($checked)
        {
            $link = mysqli_connect($serv, $user, $pass, $db);
            $sql = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`, `phone`, `created_at`) VALUES('$this->firstname', '$this->lastname', '$this->email', '$this->password', '$this->phone', $this->created_at)";
            $res = mysqli_query($link, $sql);
            mysqli_close($link);
            return $res;
        }else
        {
            return false;
        }

    }

    public function putUser($serv, $user, $pass, $db, $email)
    {
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql
            = "UPDATE user SET firstname='$this->firstname', lastname='$this->lastname', password='$this->pass', phone='$this->phone' WHERE email ='$email'";
        $res = mysqli_query($link, $sql);
        mysqli_close($link);

        return $res;
    }

    public function deleteUser($serv, $user, $pass, $db, $email)
    {
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql = "DELETE FROM user WHERE email ='$email'";
        $res = mysqli_query($link, $sql);
        mysqli_close($link);

        return $res;
    }

    public function getUserRole($serv, $user, $pass, $db, $email)
    {
        $link = mysqli_connect($serv, $user, $pass, $db);
        $sql = "SELECT role FROM user WHERE email = '$email'";
        $row = mysqli_query($link, $sql);
        $res = mysqli_fetch_row($row);
        mysqli_close($link);

        return $res;
    }
}


?>