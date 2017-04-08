<?php
namespace core\lib;

class route
{
    public $controller;
    public $action;
    public function __construct()
    {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI']!='/'){
            $uri = trim($_SERVER['REQUEST_URI'],'/');
            $uriArray = explode('/',$uri);
            if(isset($uriArray[0])){
                $this->controller = $uriArray[0];
                unset($uriArray[0]);
            }
            if(isset($uriArray[1])){
                $this->action = $uriArray[1];
                unset($uriArray[1]);
            }else{
                $this->action = conf::get('action','route');
            }

            $num = count($uriArray) + 2;
            $i = 2;
            while($i< $num){
                if(isset($uriArray[$i+1])){
                  $_GET[$uriArray[$i]] = $uriArray[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->controller = conf::get('controller','route');
            $this->action = conf::get('action','route');
        }

    }
}