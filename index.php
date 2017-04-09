<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('BASE',realpath('./'));
define('CORE',BASE.'/core');
define('APP',BASE.'/app');
define('MODULE','app');

ini_set('date.timezone','Asia/Shanghai');

define('DEBUG',true);

include 'vendor/autoload.php';

if(DEBUG){
    $whoops = new \Whoops\Run;
    $errorTitle = '框架出错了';
    $option = new \Whoops\Handler\PrettyPageHandler;
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include CORE.'/common/function.php' ;

include CORE.'/bootstrap.php';

spl_autoload_register('\core\bootstrap::load');

\core\bootstrap::run();

