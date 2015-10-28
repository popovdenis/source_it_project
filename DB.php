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
        $config = $this->getConfig();
        if (empty($config)) {
            throw new Exception('Config file does no exist');
        }
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
    }

    private function __clone()
    {
    }

    private function getConfig()
    {
        if (file_exists('config.ini')) {
            return parse_ini_file('config.ini');
        } else {
            return null;
        }
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