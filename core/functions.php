<?php
function json($value,$status = 200)
{
    header('Content-type: application/json');
    http_response_code($status);
    echo json_encode($value);
}

function view($page,$args = [])
{
    foreach ($args as $key => $arg){
        ${$key} = $arg;
    }
    $file = 'views/' . $page . '.php';
    include $file;
}

function asset($path)
{
    echo "http://" . rtrim($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],'/').'/public/' . $path;
}

