<?php 
require 'autoload.php';
use Classes\DB;
$db = new DB;

$db = $db->table('users')->where(['email','=','admin@admin.com'])->orderBy('id','desc')->first();

echo 'email: ' . $db->email . '<br>';