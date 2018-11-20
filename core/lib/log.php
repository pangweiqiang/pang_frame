<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/20
 * Time: 15:28
 */
namespace core\lib;
class log{
    function __construct()
    {
        $driver = config::get('driver','config');
        $class = 'core\lib\drivers\logs\\'.$driver;
        $conObj = new $class;
    }
}