<?php
namespace app\controller;
use core\bootstrap;
use core\lib\conf;
use core\lib\model;

class indexController extends bootstrap
{
    public function index()
    {
        $tem = conf::get('controller','route');
        $tem = conf::get('action','route');

       $data = 'cccc';
       $this->assign('data',$data);
       $this->display('index.html');
    }
}