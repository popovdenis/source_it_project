<?php

trait DB
{
    /**
     * @var mysqli Mysqli entity.
     */
    private $connection;

    /**
     * @var DB
     */
    private static $instance;

    private function __construct()
    {
        try {
            $config = Config::getConfig();

            $mysql = mysqli_init();
            $mysql->options(MYSQLI_OPT_CONNECT_TIMEOUT, 10);

            $connection = $mysql->real_connect(
                $config['host'],
                $config['username'],
                $config['password']
            );
            if (!$connection) {
                throw new Exception('No database connection');
            }
            if (!$mysql->select_db($config['database'])) {
                throw new Exception('Database is not selected');
            }
            $this->connection = $mysql;

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    private function __clone() {}

    public function __sleep() {
        throw new Exception("It is not possible to create double DB class");
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function reConnect()
    {

    }
}