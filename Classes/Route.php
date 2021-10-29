<?php
namespace Classes;
class Route extends App{
    
    public static function get($path,$callback){
       self::$routes['get'][$path] = $callback;
    }

}
