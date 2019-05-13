<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/5/6
 * Time: 16:47
 */
trait Hello{
    public function say(){
        echo 'say hello';
    }
}
class Demo {
    use Hello;
    /*public function say()
    {
        echo 'say demo';
    }*/
}
$d = new RabbitClient();
$d->say();
