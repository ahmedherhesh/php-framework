<?php

use Classes\Auth;

session_start();
function json($value, $status = 200)
{
    header('Content-type: application/json');
    http_response_code($status);
    echo json_encode($value);
}

function view($page, $args = [])
{
    foreach ($args as $key => $arg) {
        ${$key} = $arg;
    }
    $file = 'views/' . $page . '.php';
    require_once $file;
}

function asset($path)
{
    echo "http://" . rtrim($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], '/') . '/public/' . $path;
}

function redirect($URI)
{
    header('Location: ' . $URI);
    exit;
}
function session($name, $value = null)
{
    if (isset($_SESSION[$name]) && $value == null) {
        return $_SESSION[$name];
    }
    $_SESSION[$name] = $value;
}
function error($field)
{
    if (session($field)) {
        echo session($field);
        session_forget($field);
    }
}
function session_forget($name)
{
    unset($_SESSION[$name]);
}
function hash_check($password = null, $hash = null)
{
    if (password_verify($password, $hash)) {
        return true;
    }
    // return false;
}
function bcrypt($password = null)
{
    echo password_hash($password, PASSWORD_DEFAULT);
}
//Auth

$auth = null;
function auth()
{
    global $auth;
    if (!$auth) {
        $auth = new Auth;
    }
    return $auth;
}

// API helpers
