<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/12/7
 * Time: 10:44
 */
class sessCook {
    public function setSession(){

        $_SESSION['name'] = 'hahaha';
    }
    public function getSession(){
        echo $_SESSION['name'];
    }
}
$obj = new sessCook();
$obj->setSession();
//$obj->getSession();