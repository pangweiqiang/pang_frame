<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-12-4
 * Time: 上午8:24
 */
class Day2{
    /**
     * 字符串数组
     * 字符串处理
     */
    public static function demo(){

    }
}


/*function test(){
    static $a ;
    var_dump($a++) ;

}*/
$a = 1;
function test2 (){
    echo 'haha';
    /*global $a;
    echo $GLOBALS['a'];
    echo $a++;
    unset($GLOBALS['a']);
    unset($a);*/
}
require './Day3.php';
test2();
test2();
test2();
//echo $a;
echo date_default_timezone_get();
echo date_default_timezone_set('Asia/Shanghai');
var_dump(microtime());
var_dump(time());
var_dump(mktime());