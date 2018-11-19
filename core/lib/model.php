<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 下午11:27
 */
namespace core\lib;
class model extends \PDO{
    public function __construct()
    {
        $dsn = "mysql:localhost;dbname=test";
        $username = 'root';
        $passwd = '260822';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }
    public function getData(){
        try{
            $ret = $this->query("SELECT t.* FROM test.user t");
        }catch (\Exception $e){
            echo $e->getMessage();
        }

        var_dump($ret);
        var_dump($ret->fetchAll());
    }
}