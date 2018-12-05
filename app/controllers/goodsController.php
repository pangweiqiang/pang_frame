<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/21
 * Time: 14:42
 */
namespace app\controllers;
use function Sodium\add;

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
    public static function demo5(){
        //echo dirname(__FILE__);
      //  var_dump($_SERVER);
       // if(($a = 2) === 2){
            //echo $a;
      //  }
       // echo strtr('abcd','a','b');
      //  echo strtr('abcd',array('a'=>'b','ab'=>'cc'));//字符串替换
       // echo str_replace('a','b','abcd');//字符串替换
      //  echo str_replace(array('d','ab','a'),array('cd','b'),'ababcd');
        // 字符串截取
     //   echo stristr('aBcbd','b',false);  strchr()
      //  echo strstr('aBcbd','b',true);
      //  var_dump( substr('abcde',-3));
        //  echo $a;
        //strpos()
        //stripos('BaBbd','b');
       /* echo $a = addslashes('aaaaaa""a');
        echo addcslashes('aaaaaa""a','..');
        echo stripcslashes($a);*/

        /*$_ENV;
        $_GET;
        $_POST;
        $_SERVER;
        $_REQUEST;
        $_COOKIE;
        $_SESSION;
        $_FILES;*/
       // echo 2 == 1+1;
        // 0 0.0 '0' [] null false ''  false七种情况
        $b = '';
        $a = true && $b == 3;
        var_dump($a);
    }

    /**
     * @author pwq
     * 正则表达式
     * 1 贪婪模式 2 反向引用
     * 查询 匹配 替换 筛选
     */
    public static function demo1(){
        $str2 = "<img id='100' style='abc' src='av.jpg' />";
        $str1 = "<a>abc</a><a>bcd</a>";
        $pattern = '/<a>(.*?)<\/a>/';
        $pattern2 = "/<img (.*) \/>/";
        preg_match_all($pattern2,$str2,$match);
        var_export($match);
        $arr = explode(' ',trim($match[1][0]));
        $s = [];
        foreach ($arr as $item){
            $mid = explode('=',$item);
            $s[$mid[0]] = $mid[1];
        }
        var_dump($s);
        //preg_replace(); preg_match()
    }
    public static function demo6(){
        $str = 'abcd';
        $pattern = '/ab(.+)/';
        var_dump(preg_replace($pattern,'$1',$str));
        echo $str;
    }

    /**
     * @author pwq
     * preg_replace
     */
    public static function preg(){
        $pattern = '/hello/';
        $str = 'hello world';

        //echo preg_replace($pattern,'aa',$str);
    }
    public static function pregSplit(){
        $pattern = '/\//';
        $str = 'hello/world/aaa';
        $str = preg_split($pattern,$str);
        var_dump($str);
        $str='http://blog.csdn.net/hsd2012/article/details/51152810';
        $pattern='/\//';  /*因为/为特殊字符，需要转移*/
        $str=preg_split ($pattern, $str);
        var_dump($str);
    }
    public static function  testIngorn(){
        $str='aageacwWgewcaw';
        $pattern='/a\w*c/i';
        $str=preg_match($pattern, $str,$match);
        var_dump($match);
    }

    /**
     * @author pwq
     * 固态分组
     * 使用情况
     * 被固态的内容不包括后缀的内容  否则会影响判断
     */
    static function gtGroup(){
        $str = "11111a";
        $pattern1 = '/\d*a/';
        $pattern2 = '/(?>\d*)a/';
        var_dump(preg_match($pattern1,$str));
        var_dump(preg_match($pattern2,$str));
        echo ucfirst('aaav aa');
        echo ucwords('aaaa aa');

    }
}

goodsController::gtGroup();
//goodsController::a();