<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 上午8:18
 */
function p ($param = ''){
    if(is_array($param)){
        var_dump($param);
    }else{
        echo $param;
    }
}