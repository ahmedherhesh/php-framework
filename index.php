<?php 
require 'autoload.php';
use Classes\DB;
$DB = new DB;
$users = $DB->table('users')->where(['email','=','admin@admin.com'])->get();

$DB = new DB;
// $DB = $DB->table('users')->delete();
// echo $DB;
echo '<pre>';
print_r($users);