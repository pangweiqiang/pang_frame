<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/3/7
 * Time: 17:27
 */
require_once '../../vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class RabbitmgController
{
    function demo(){

        $exchange_name = "exchange_name";
        $queue_name = "queue_name";
        $route_name = "route_name";
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->exchange_declare($exchange_name,'direct',false,true,false);//声明 初始化交换机
        $channel->queue_declare($queue_name,false,false,false,false);//声明初始化一个队列
        $channel->queue_bind($queue_name,$exchange_name,$route_name);//将队列与交换机进行绑定
       // $channel->queue_declare('queue_name', false, false, false, false);
        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };
        $channel->basic_consume('hello', '', false, true, false, false, $callback);
        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
    public function demo2(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}
$demo = new RabbitmgController();
$demo->demo2();