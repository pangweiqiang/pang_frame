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
class Demo {
    public function demo1(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);

        $msg = new AMQPMessage('Hello Worldaaaa!');
        $channel->basic_publish($msg, '', 'hello');

        echo " [x] Sent 'Hello World!'\n";
        $channel->close();
        $connection->close();
    }

}
(new Demo())->demo1();