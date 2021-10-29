<?php

namespace Classes;

class App
{
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

    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public static function run()
    {
        $path     = ltrim(self::getPath(), '/');
        $path = str_replace(Config::$env['APP_NAME'], '', $path);
        $method   = self::getMethod();
        $callback = self::$routes[$method][$path] ?? false;
        if (!$callback) {
            echo '404';
            exit;
        }
        if (is_callable($callback)) {
            call_user_func($callback);
            exit;
        }
        
    }
}
