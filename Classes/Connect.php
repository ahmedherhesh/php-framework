<?php
namespace Classes;

class Connect extends Config
{

    public $con;
    public function __construct()
    {
        try {
            $this->con = new \PDO('mysql:host=' . self::$env['DB_HOST'] . ';dbname=' . self::$env['DB_NAME'], self::$env['USERNAME'], self::$env['PASSWORD']);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
