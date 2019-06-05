<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/12/6
 * Time: 17:13
 */
function handleFile(){
    $path = "hello2.txt";
    $path = 'https://www.baidu.com/';
    //echo basename($path);//返回文件名的基础部分
    // rewind 充值到头部 ftell 查看当前指针的位置  fseek 移动指针到制定的位置
    // r 只读方式打开 文件必须存在 r+ 读写方式打开 指针会在文件的末尾  接着写操作
    // w 写方式打开 如果文件不存在 会创建文件。如果文件存在 会清空文件
    // w+ 读写方式打开 不存在 会创建文件 必须先写在读  因为fopen打开的时候会清空文件，
    // 同时写结束的时候 会把指针会停留在尾部 如果想读 需要移动指针
    // a 相比较w更加全能 文件不存在 他也会新建文件 但它不会清空文件中的内容 它是直接在尾部写入
    // a+ 是对内容进行读操作
    // X 写权限是创建不存在的文件的 如果文件存在 就会报错
    // X+ 是读写 权限
    $handle = fopen($path,'r');
    $content = fread($handle,filesize($path));
    var_dump(filesize($path));
    var_dump($content);
    var_dump(ftell($handle));exit;
    //$content = fread($handle,$path);
    $content = 'Hello,';
    fwrite($handle,$content);
    var_dump(ftell($handle));
    var_dump(filesize($path));
    //fseek($handle,0);
    rewind($handle);
    $content = fread($handle,filesize($path));
    var_dump(filesize($path));
    var_dump($content);
    fclose($handle);
    var_dump(filesize($path));
exit;
 //   echo $str = iconv("gb2312", "utf-8", $content);exit;
    $handle =  fopen($path,'w');
    fwrite($handle,$content);
    fclose($handle);
    header("Content-Type:text/html;charset=utf-8");
    echo file_get_contents('./hello.txt');
}
//handleFile();
function deleteFile(){
    var_dump(pathinfo('./'));
    var_dump(disk_free_space('./'));
    var_dump(disk_total_space('./'));
    echo dirname('a/b/c/aa.txt');
    exit;unlink('hello2.txt');//删除文件使用的
}
//deleteFile();

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

/**
 * @param $path
 * 'aaa'
 */
function consoleDir($path){
    $handle = opendir($path);
    while ($fileName = readdir($handle)){
        if( $fileName == '.' || $fileName == '..'){
            continue;
        }
        $newPath = $path.'/'.$fileName;
        echo $fileName.PHP_EOL;
        if(is_dir($newPath)){
            consoleDir($newPath);
        }
    }
    closedir($handle);
}

/**
 *
 * filefunc 的练习
 */
function fileFunc(){

    var_dump(file('aaa/hello1.txt'));
}
fileFunc();
//newFile();
//consoleDir('aaa');