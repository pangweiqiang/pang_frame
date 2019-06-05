<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 下午6:39
 */
namespace app\controllers;
use core\lib\config;
use core\lib\log;
use core\lib\model;
use core\pang;

class indexController extends pang {


    public $a = 'afewfawef';
    public function index(){
        echo 'this is controller index method !';
        $model = new model();
        $data = $model->select('test','*',['id'=>1]);
        var_dump($data);
        //$data = $model->getData();
        //var_dump($data);efawef
        log::log('你好','pang');
        $this->assign('title','nba体育');
        $this->assign('name','jamas');
        $this->display('index.html');
    }
    public function headerDemo(){
        //var_dump($_GET['name']);
        //include 'superArr.php';
        header('HTTP/1.1 301 Move Permanently');
        header('Location: http://www.pang.com/index/index');
    }
    public function b(){
        session_start();
        $_SESSION['user_name'] = 'pangweiqiang';
        $_SESSION['password'] = '123';
        setcookie('_user_info',session_id());
    }
    public function c(){

        /*$str = 'user_name|s:12:"pangweiqiang";password|s:3:"123"';
        var_dump(unserialize($str));exit;*/
        session_start();
        var_export($_SESSION);
        echo $_SESSION['user_name'];
        echo $_SESSION['password'];
    }
    public function d(){
        session_start();
       session_destroy();
      //  unset($_SESSION['user_name']);
    }
}
