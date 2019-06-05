<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-12-9
 * Time: 下午9:30
 */
namespace app\controllers;
class CookieController{
    function a(){
       /* setcookie('h[1]',123);
        setcookie('h[2]',123);
        setcookie('h[3]',123);*/
        setcookie('test','');
        //var_dump($_COOKIE['h']);
    }
    public function b(){
        session_start();
        $_SESSION['name'] = 1;
        $_SESSION['V'] = 2;
    }
}
