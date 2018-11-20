<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/20
 * Time: 15:28
 */
namespace core\lib;
class log{
    private static $logObj;
    public static function init(){
        $driver = config::get('driver','config');
        $class = 'core\lib\drivers\logs\\'.$driver;
        self::$logObj = new $class;
    }
    public static function log($message,$name = 'log'){
        self::$logObj->log($message,$name);
    }
}