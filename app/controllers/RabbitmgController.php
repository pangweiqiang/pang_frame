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

    public function demo2(){
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->exchange_declare('exchange_topic', 'topic', false, false, false);
        $channel->queue_declare('hello_queue1', false, true, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
            sleep(2);
            echo "[x] Done", "\n";
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };
        $channel->queue_bind('hello_queue1','exchange_topic','*.q1');
        $channel->basic_qos(null, 1, null);
        $channel->basic_consume('hello_queue1', '', false, false, false, false, $callback);

        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}
$demo = new RabbitmgController();
$demo->demo2();