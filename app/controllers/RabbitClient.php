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
        $channel->queue_declare('hello_queue', false, true, false, false);
        $channel->exchange_declare('logs', 'fanout', false, false, false);
        $msg = new AMQPMessage('Hello pang!',['delivery_mode'=>AMQPMessage::DELIVERY_MODE_PERSISTENT]);
        $channel->basic_publish($msg, 'logs');
        $channel->queue_bind('hello_queue','logs');
        echo " [x] Sent 'Hello World!'\n";
        $channel->close();
        $connection->close();
    }

}
(new RabbitClient())->demo1();