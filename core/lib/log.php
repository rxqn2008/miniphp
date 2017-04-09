<?php
namespace core\lib;

class log
{
    static $class ;
    public static function init(){
        $driver = conf::get('DRIVER','log');
        $class = '\core\lib\driver\log\\'.$driver;
        self::$class = new $class;
    }

    public static function log($message,$file = 'log')
    {
        self::$class ->log($message,$file);
    }
}