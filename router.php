<?php
$routes  = [];
function route($path,$callback){
    global $routes;
    $path = trim($path,'/');
    $routes[$path] = $callback;
}
function dispatch($action){
    global $routes;
    $action = trim($action,'/');
    echo call_user_func($routes[$action]);
}
// dispatch($_SERVER['REQUEST_URI']);