<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-19
 * Time: 下午11:27
 */
namespace core\lib;
use Medoo\Medoo;

class model extends Medoo {
    public function __construct()
    {
        $dateCon = config::getAll('datebase');
        try{
            //$dateCon['DSN'], $dateCon['USERNAME'], $dateCon['PASSWD'];
            $config = [
                'database_type' =>$dateCon['DATABASE_TYPE'],
                'database_name' => $dateCon['DATABASE_NAME'],
                'server' => $dateCon['HOST'],
                'username' => $dateCon['USERNAME'],
                'password' => $dateCon['PASSWD'],
            ];
            parent::__construct($config);
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