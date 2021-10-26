<?php
namespace Classes;
class Config{
    public $server;
    public function __construct()
    {
        $this->server = [
            'host' => '127.0.0.1',
            'db'   => 'olx-backend',
            'user' => 'root',
            'pass' => '',
        ];
    }
}