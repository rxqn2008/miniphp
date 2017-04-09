<?php
namespace core\lib\driver\log;

use core\lib\conf;

class file
{

    public $path;

    public function __construct()
    {
        $option = conf::get('OPTION', 'log');
        $this->path = $option['PATH'];
    }

    public function log($message, $file = 'log')
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, '0777', true);
        }
        return file_put_contents($this->path . $file . '.php', date('Y-m-d H:i:s').json_encode($message).PHP_EOL , FILE_APPEND);
    }
}