<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/3/7
 * Time: 18:49
 */
require_once "../../vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class RabbitClient {
    public function demo1(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        /*$channel->queue_declare('hello_queue1', false, true, false, false);
        $channel->queue_declare('hello_queue2', false, true, false, false);*/
        $channel->exchange_declare('exchange_topic', 'topic', false, false, false);
        /*$channel->queue_bind('hello_queue1','exchange_fanout');
        $channel->queue_bind('hello_queue2','exchange_fanout');*/
        $msg = new AMQPMessage('Hello pang!',['delivery_mode'=>AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        $channel->basic_publish($msg, 'exchange_topic','aaaa.q1');
        echo " [x] Sent 'Hello World111!'\n";
        $channel->close();
        $connection->close();
    }

    /**
     * @author pwq
     * rpc的方式调用
     */
    public function rpcClient(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        /*$channel->queue_declare('hello_queue1', false, true, false, false);
        $channel->queue_declare('hello_queue2', false, true, false, false);*/
        $channel->exchange_declare('exchange_topic', 'topic', false, false, false);
        /*$channel->queue_bind('hello_queue1','exchange_fanout');
        $channel->queue_bind('hello_queue2','exchange_fanout');*/
        $msg = new AMQPMessage('Hello pang!',['delivery_mode'=>AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        $channel->basic_publish($msg, 'exchange_topic','aaaa.q1');
        echo " [x] Sent 'Hello World111!'\n";
        $channel->close();
        $connection->close();
    }

}
(new RabbitClient())->rpcClient();