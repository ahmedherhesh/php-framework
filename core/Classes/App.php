<?php

namespace Core\Classes;

class App
{

    public static $request;
    public static $routes = [];

    public static function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public static function run()
    {
        // $path     = ltrim(self::getPath(), '/'); //use this in localhost and comment next line
        $path     = self::getPath(); //use this in server
        $path     = str_replace(Config::$env['APP_NAME'], '', $path);
        $method   = strtolower($_SERVER['REQUEST_METHOD']);
        // important 
        $callback = self::$routes[$method][$path] ?? false;
        if (!$callback) {
            return view('errors/404');
            exit;
        }
        self::$request = new Request;
        if (is_callable($callback)) {
            echo call_user_func($callback, self::$request);
            exit;
        }
    }
}
