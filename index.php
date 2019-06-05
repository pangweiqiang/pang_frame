<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 上午8:08
 * 入口文件
 * 1定义常亮
 * 2加载函数库
 * 3启动框架
 */

define('PANG_FRAME',dirname(__FILE__));//当前项目根目录路径
define('CORE',PANG_FRAME.DIRECTORY_SEPARATOR.'core');//项目核心文件路径
define('APP',PANG_FRAME.DIRECTORY_SEPARATOR.'app');//项目文件目录
include 'vendor/autoload.php';

define('DEBUG',true);
if(DEBUG){
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors',true);
}else{
    ini_set('display_errors',false);
}
include CORE.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'function.php';
include CORE.DIRECTORY_SEPARATOR.'pang.php';
spl_autoload_register('\core\pang::load');
\core\pang::run();

