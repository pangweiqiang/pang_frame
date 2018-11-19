<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 下午6:39
 */
namespace app\controllers;
use core\lib\model;

class indexController{
    public $a = 'afewfawef';
    public function index(){
        echo 'this is controller index method !';
        $model = new model();
        $data = $model->getData();
        var_dump($data);
    }
}
