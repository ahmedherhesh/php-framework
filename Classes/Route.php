<?php
namespace Classes;
class Route extends App{
    
    public static function get($path,$callback){
       self::$routes['get'][$path] = $callback;
    }
    public static function post($path,$callback){
        self::$routes['post'][$path] = $callback;
    }
    public static function put($path,$callback){
        self::$routes['put'][$path] = $callback;
    }
    public static function delete($path,$callback){
        self::$routes['post'][$path] = $callback;
    }
}
