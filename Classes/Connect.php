<?php
namespace Classes;

class Connect extends Config
{
    public $host = '127.0.0.1';
    public $db   = 'olx';
    public $user = 'root';
    public $pass = '';
    public $con;
    public function __construct()
    {
        try {
            $this->con = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pass);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
