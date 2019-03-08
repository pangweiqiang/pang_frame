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
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class indexController extends pang {


    public $a = 'afewfawef';
    public function index(){
        echo 'this is controller index method !';
        $model = new model();
        $data = $model->select('test','*',['id'=>1]);
        var_dump($data);
        //$data = $model->getData();
        //var_dump($data);efawef
        log::log('你好','pang');
        $this->assign('title','nba体育');
        $this->assign('name','jamas');
        $this->display('index.html');
    }
    public function headerDemo(){
        $con = new AMQPStreamConnection('localhost',5672,'guest','guest');
        $channel = $con->channel();// 在已经连接的基础上，建立生产者与mq之间的通道
        $exchange_name = "exchange_name";
        $queue_name = "queue_name";
        $route_name = "route_name";
        $channel->exchange_declare($exchange_name,'direct',false,true,false);//声明 初始化交换机
        $channel->queue_declare($queue_name,false,false,false,false);//声明初始化一个队列
        $channel->queue_bind($queue_name,$exchange_name,$route_name);//将队列与交换机进行绑定
        $msg = new AMQPMessage(json_encode(['name'=>'hello world','age'=>13]));
        $channel->basic_publish($msg,$exchange_name,$route_name);
        $channel->close();
        $con->close();
        echo 'ok';
    }
    public function receiveMsg(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->basic_consume('hello', '', false, true, false, false, $callback);
        /*while (count($channel->callbacks)) {
            $channel->wait();
        }*/
    }
    public function b(){
        session_start();
        $_SESSION['user_name'] = 'pangweiqiang';
        $_SESSION['password'] = '123';
    }
    public function c(){

        /*$str = 'user_name|s:12:"pangweiqiang";password|s:3:"123"';
        var_dump(unserialize($str));exit;*/
        session_start();
        var_export($_SESSION);
        echo $_SESSION['user_name'];
        echo $_SESSION['password'];
    }
    public function d(){
        session_start();
       session_destroy();
      //  unset($_SESSION['user_name']);
    }
}
