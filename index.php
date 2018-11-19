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

define('PANG_FRAME',dirname(__FILE__));
define('CORE',PANG_FRAME.'/core');
define('APP',PANG_FRAME.'/app');


define('DEBUG',true);

if(DEBUG){
    ini_set('display_errors',true);
}else{
    ini_set('display_errors',false);
}
include CORE.'/common/function.php';
include CORE.'/pang.php';
spl_autoload_register('\core\pang::load');
\core\pang::run();

