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
    echo "http://" . $_SERVER['HTTP_HOST'] .'/public/' . $path;
}

