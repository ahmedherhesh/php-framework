<?php

namespace Classes;

class Connect extends Config
{

    public $con;
    public $options = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
    ];
    public function __construct()
    {
        try {
            $this->con = new \PDO(
                'mysql:host='. 
                self::$env['DB_HOST'].
                ';dbname='. 
                self::$env['DB_NAME'],
                self::$env['USERNAME'],
                self::$env['PASSWORD'],
                $this->options
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
