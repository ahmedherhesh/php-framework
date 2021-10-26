<?php 
require 'autoload.php';
use Classes\DB;

$DB = new DB;
$user = $DB->table('cities')->create($_GET);
var_dump($user);