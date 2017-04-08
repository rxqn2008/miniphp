<?php
namespace core\lib;

class conf
{
    public static $conf = array();
    public static function get($name,$file)
    {
        if(isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }

        $path = BASE.'\core\config\\'.$file.'.php';
        if(is_file($path)){
            $conf = include $path;
            if(isset($conf[$name])){
                self::$conf[$file] = $conf;
                return $conf[$name];
            }else{
                throw new \Exception('找不到这个配置项');
            }
        }else{
            throw new \Exception('找不到文件'.$file);
        }
    }

    public static function all($file)
    {
        if(isset(self::$conf[$file])){
            return self::$conf[$file];
        }

        $path = BASE.'\core\config\\'.$file.'.php';
        if(is_file($path)){
            $conf = include $path;
            self::$conf[$file] = $conf;
            return $conf;
        }else{
            throw new \Exception('找不到文件'.$file);
        }
    }
}