<?php
/**
 * Created by PhpStorm.
 * User: xueyou
 * Date: 16-12-27
 * Time: 下午10:09
 */

namespace core;

use core\lib\log;

class bootstrap
{
    public static $classMap = array();
    public $assign;

    public static function run()
    {
       // log::init();

        $route = new \core\lib\route();
        $ctrlNmae = $route->controller;
        $action = $route->action;
        $classFile = APP.'/controller/'.$ctrlNmae.'Controller.php';
        $class = '\\'.MODULE.'\controller\\'.$ctrlNmae.'Controller';
        if(is_file($classFile)){
            include $classFile;
            $controller = new $class();
            $controller->$action();
            //log::log($ctrlNmae.'=='.$action);
        }else{
            throw new \Exception('找不到控制器 '.$class);
        }
    }

    public static function load($class)
    {
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\','/',$class);
            $file = BASE.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class]=$class;
            }else{
                return false;
            }
        }
    }

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }
    }
} 