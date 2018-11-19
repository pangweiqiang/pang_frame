<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 上午8:18
 */
namespace core;
use app\controllers\indexController;

class pang{
    public static $classMap;
    public function __construct()
    {

    }
    public static function run(){
        $routeObj = new \core\lib\route();
        $mothed = $routeObj->action;
        $controller = $routeObj->controller;
        $class = '\app\controllers\\'.$controller.'Controller';
        echo $class."</br>";
        $conObj = new $class;
        $conObj->$mothed();
        echo "</br>";
        var_dump($conObj);
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
            return false;
        }
    }

}