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
        $dateCon = config::getAll('datebase');
        try{
            parent::__construct($dateCon['DSN'], $dateCon['USERNAME'], $dateCon['PASSWD']);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }
    public function getData(){
        try{
            $ret = $this->query("SELECT t.* FROM test.test t");
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        var_dump($ret->fetchAll());
    }
}