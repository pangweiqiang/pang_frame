<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/20
 * Time: 15:28
 */
namespace core\lib\drivers\logs;
class file{
    public function log($pathName = 'log',$message){
        $path = PANG_FRAME.DIRECTORY_SEPARATOR.'log';
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        return file_put_contents($pathName.DIRECTORY_SEPARATOR.$pathName.date('YmdHi').'.log',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}