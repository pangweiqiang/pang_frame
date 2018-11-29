<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/21
 * Time: 14:42
 */
namespace app\controllers;
class goodsController {
    private $val ;
    /**
     * @author pwq
     * learn 变量引用
     *
     * cow机制
     * 引用
     */
    // 变量名不同，使用相同的内存空间的内容  官方 用不同的变量名 访问相同的变量内容
    public static function blyy(){
        var_dump(ini_get('memory_limit'));
        ini_set('memory_limit','100M');
        var_dump(ini_get('memory_limit'));
        var_dump(memory_get_usage(true)/1024/1024);
        $a = range(1, 100000);
        //echo memory_get_usage() ;
        var_dump(memory_get_usage(true)/1024/1024);
        var_dump(memory_get_usage());
        $a = rand(1,100000);
        xdebug_debug_zval('a');
        var_dump(memory_get_usage());
        $b = &$a;
        xdebug_debug_zval('a');
        var_dump(memory_get_usage());
        $a = rand(1,100000);
        xdebug_debug_zval('a');
        var_dump(memory_get_usage());
        $c = &$b;
        xdebug_debug_zval('a');
    }

    /**
     * @author pwq
     * unset的点
     */
    public static function demo(){
        $a = 1;
        $b = &$a;
        unset($a);// 2 unset 的点
        echo $b;
    }
    /**
     * 对象默认就使用了引用
     *
     * $v
     * abc bbc bcc bcc
     */
    public static function demo2(){
        $data = ['a','b','c'];
        foreach ($data as $k=>$v){
            //var_dump($data[$k]);
            $v = &$data[$k];
            xdebug_debug_zval('v');
            var_dump($data);
        }
        var_dump($data);
    }
    public static function dmeo3(){
        $a = 1;
        $str = "select{$a}bce";
        echo $str;
    }

    /**
     * @author pwq
     * heredoc 类型双引号 newdoc 类似单引号
     */
    public static function demo4(){
        $a = 1;
        $str = <<<ET
            heredoc test!!!
 afewfawefawef $a
 afeaewf
 
ET;
        $str2 = <<<'etc'
afefaefaewfa{$a}
        efawefawefawefa
etc;

        echo $str2;
    }
}

goodsController::demo4();
//goodsController::a();