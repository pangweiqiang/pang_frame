<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/3/8
 * Time: 18:06
 */
require_once "../../vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
class Mqlib{
    private $config = [
        'host'=>'localhost',
        'port' => '5672',
        'username'=>'guest',
        'password' => 'guest',
    ];
    private $queueName = '';
    private $exchangeName = '';
    private $routeKey='';
    private $connect = '';
    private $channel = '';
    private $exchangeType = '';

    function __construct($exchangeName,$queueName,$routeKey,$config = [])
    {
        $this->exchangeName = $exchangeName;
        $this->queueName = $queueName;
        $this->routeKey = $routeKey;
        !empty($config) && $this->config = $config;
        $this->connect();
    }
    public function connect(){
        $this->connect = new AMQPStreamConnection('localhost',5672,
            'guest','guest');
        $this->channel = $this->connect->channel();
    }
    function __destruct()
    {
        $this->channel->close();
        $this->connect->close();
    }

    public function demo(){
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

    /**
     * init操作
     */
    public function init(){

    }

    /**
     * @author pwq
     * 创建交换机
     */
    public function createExchange(){
        $this->channel->exchange_declare($this->exchangeName,$this->exchangeType,false,true,false);
    }

    /**
     * @author pwq
     * 创建队列
     */
    public function createQueue(){
        $this->channel->queue_declare($this->queueName,false,false,false,false);//声明初始化一个队列
    }
    /**
     * 队列和交换机绑定
     */
    public function bind(){
        $this->channel->queue_bind($this->queueName,$this->exchangeName,$this->routeKey);
    }






}