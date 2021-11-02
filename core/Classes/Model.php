<?php

namespace Core\Classes;

abstract class Model extends DB
{
    public static $_table;
    public function __construct($_table)
    {
        self::$_table = DB::run()->table($_table);
    }
    public static function run()
    {
        return self::$_table;
    }
    public function if_prop_exist($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
