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
        $pathName = PANG_FRAME.DIRECTORY_SEPARATOR.$pathName;
        if(!is_dir($pathName)){
            mkdir($pathName,0777);
        }
        file_put_contents();
    }
}