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
    public function b(){
        echo 1;
    }

}
