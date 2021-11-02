<?php

use Core\Classes\Auth;

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
$errors = [];
function validate_add($key, $item)
{
    global $errors;
    if (!isset($_REQUEST[$key]) || empty($_REQUEST[$key])) {
        if ($item == 'required') {
            $errors['messages'][$key][] =  'this ' . $key . ' field is required';
        }
    } else {

        if (substr($item, 0, 3) == 'max') {
            $value = substr($item, 4);
            if (strlen($_REQUEST[$key]) > $value) {
                $errors['messages'][$key][] =  'this ' . $key . ' field is max length ' . $value;
            }
        }
        if (substr($item, 0, 3) == 'min') {
            $value = substr($item, 4);
            if (strlen($_REQUEST[$key]) < $value) {
                $errors['messages'][$key][] =  'this ' . $key . ' field is min length ' . $value;
            }
        }
        if ($item == 'string') {
            if (gettype($_REQUEST[$key]) !== $item) {
                $errors['messages'][$key][] =  'this ' . $key . ' field  must be a string';
            }
        }
        if ($item == 'integer' || $item == 'int') {
            if (gettype($_REQUEST[$key]) !== 'integer') {
                $errors['messages'][$key][] =  'this ' . $key . ' field  must be a integer';
            }
        }
    }
}
function validate($array = [])
{
    global $errors;
    foreach ($array as $key => $arr) {
        foreach (explode('|', $arr) as $item) {
            validate_add($key, $item);
        }
    }
    return $errors;
}
function error($field)
{
    if (session($field)) {
        echo session($field);
        session_forget($field);
    }
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
