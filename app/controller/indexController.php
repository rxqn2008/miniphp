<?php
namespace app\controller;
use app\model\articleModel;
use core\bootstrap;
use core\lib\conf;

class indexController extends bootstrap
{
    public function index()
    {
        $tem = conf::get('controller','route');
        $tem = conf::get('action','route');

        $article = new articleModel();
        //$data = $article->lists();
        $data = $article->getOne(1);
       dump($data);exit;

       $data = 'cccc';
       $this->assign('data',$data);
       $this->display('index.html');
    }
}