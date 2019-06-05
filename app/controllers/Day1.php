<?php
/**
 * Created by PhpStorm.
 * User: joseef
 * Date: 18-11-29
 * Time: 下午10:43
 */
function a(){
    $a = 0.1;
    $b = 0.7;
    $c =  $a + $b;
    var_dump(floatval($c));
    $c =  floor(($a + $b) * 10);
    echo $c."</br>";
    if($c == 0.8){
        echo 1;
    }
    echo 2;

   echo round(5.456,2);

}
//a();
function c(){
    $a = 2;

    $c = true == (1 + ++$a > 1+2);
    $b = 1;
    if($a = true || $b == 3){
        echo 2;
    }
    echo true;
 //   echo $c;
    $k= bcadd('0.7' ,'0.1',2);
    echo $k;
}
c();
//