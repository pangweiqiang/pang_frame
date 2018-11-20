<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/20
 * Time: 15:28
 */
namespace core\lib\drivers\logs;
use core\lib\config;

class file{
    private $path ;
    public function __construct()
    {
        $this->path = config::get('path','config');
    }

    public function log($message,$pathName = 'log'){
        $path = $this->path;

        if(!is_dir($path)){

            mkdir($path,0777,true);
        }
        return file_put_contents($path.DIRECTORY_SEPARATOR.$pathName.date('YmdH').'.log',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}