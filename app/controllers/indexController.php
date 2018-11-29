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
        //$data = $model->getData();
        //var_dump($data);
        log::log('你好','pang');
        $this->assign('title','nba体育');
        $this->assign('name','勒布朗。詹');
        $this->display('index.html');
    }
}
