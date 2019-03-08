<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/12/6
 * Time: 17:13
 */
function handleFile(){
    $path = "hello.txt";
    $handle = fopen($path,'r');
    $content = fread($handle,filesize($path));
    $content = 'Hello你好,'.$content;
    fclose($handle);
    echo $content;
    echo mb_convert_encoding($content, "UTF-8", "auto");exit;
 //   echo $str = iconv("gb2312", "utf-8", $content);exit;
    $handle =  fopen($path,'w');
    fwrite($handle,$content);
    fclose($handle);
    header("Content-Type:text/html;charset=utf-8");
    echo file_get_contents('./hello.txt');
}
//handleFile();
function newFile(){

    $arr = scandir('./aaa');
    //var_dump($arr);exit;
    if(!is_dir('./aaa')){
        mkdir('./aaa');
    }
    $path = "./aaa/hello1.txt";
    $handle = fopen($path,'a+');
    fwrite($handle,'aaaa');
    fclose($handle);
}
newFile();