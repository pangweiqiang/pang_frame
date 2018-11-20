<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 上午8:18
 */
namespace core;
use app\controllers\indexController;
use core\lib\log;

class pang{
    public static $classMap;
    private $assignArr = [];
    public function __construct()
    {
    }
    public static function run(){
        $routeObj = new \core\lib\route();
        new log();
        $mothed = $routeObj->action;
        $controller = $routeObj->controller;
        $class = '\app\controllers\\'.$controller.'Controller';
        $conObj = new $class;
        $conObj->$mothed();
    }

    /**
     * 自动加载类库
     */
    public static function load($class){
        $class = str_replace('\\','/',$class);
        if(isset(self::$classMap[$class])){
            return true;
        }
        $path = PANG_FRAME.'/'.$class.'.php';
        echo $path."</br>";
        if(is_file($path)){
            include $path;
            self::$classMap[$class] = $class;
        }else{
            throw new \Exception('文件不存在');
        }
    }
    public function assign($key,$val){
        $this->assignArr[$key] = $val;
    }
    public function display($file){
        $filePath = APP.'/views/'.$file;
        if(is_file($filePath)){
            !empty($this->assignArr) && extract($this->assignArr);
            include $filePath;
        }else{
            throw new \Exception('视图文件不存在');
        }
    }

}