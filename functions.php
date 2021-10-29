<?php
function view($page,$r=[]){
    require_once 'views/'.$page . '.php';
}
function json($value){
    header('Content-type: application/json');
    echo json_encode($value);
}
function asset($path){
    echo $_GET['base_url']. '/public/' . $path;
}
