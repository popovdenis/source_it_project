<?php
class DataBase
{
    /**
     * @var mysqli
     */
    public static $db = null;
    /**
     * @var mysqli_result
     */

    public $result;

    public function  __construct()
    {
        self::$db = MyiDB::getInstance()->getConnection();
    }

    public function getInsertId()
    {
        return self::$db->insert_id;
    }

    public function execute($sql)
    {
        $this->result = self::$db->query($sql);
    }

    public function fetchAll()
    {
        return $this->result->fetch_all();
    }

    public function escape($value)
    {
        return self::$db->real_escape_string(trim(strip_tags($value)));
    }

}

//$database=new DataBase();
//$database->execute('SELECT * FROM news');
//echo "<pre>";
//    var_dump( $database->fetchAll() );
//echo "</pre>";