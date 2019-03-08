<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 下午2:04
 */
namespace core\lib;
class route{
    public function __construct()
    {
       // echo 'route is ok';
        $this->init();
    }
    public $controller;
    public $action;
    public function init(){
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] <> '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/',trim($path,'/'));
            if(isset($pathArr[0])){
                $this->controller = $pathArr[0];
            }

            if(isset($pathArr[1])){
                if(false !== strpos($pathArr[1],'?') ){
                    $pathArr[1] = explode('?',$pathArr[1])[0];//接受？
                }
                $this->action = $pathArr[1];
            }else{
                $this->action = 'index';
            }
            $num = count($pathArr);
            $i = 2;
            while ($num > $i ){
                if(isset($pathArr[$i]) && isset($pathArr[$i + 1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                    $i += 2;
                }
            }
        } else{
            $this->controller = 'index';
            $this->action = 'index';
        }
    }
}