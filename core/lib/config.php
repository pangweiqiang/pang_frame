<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/20
 * Time: 14:07
 *
 * 判断配置文件是否存在
 * 判断配置是否存在
 * 缓存配置
 *
 */
namespace core\lib;
class config{
    private static $fileMap;
    static public function get($name,$file){
        if(isset(self::$fileMap[$file])){
            if(isset(self::$fileMap[$file][$name])){
                return self::$fileMap[$file][$name];
            }else{
                throw new \Exception('key值不存在');
            }
        }
        $filePath = CORE.'/config/'.$file.'.php';
        if(is_file($filePath)){
            $config = include $filePath;
            self::$fileMap[$file] = $config;
            if(isset($config[$name])){
                return $config[$name];
            }else{
                throw new \Exception('key值不存在');
            }
        }else{
            throw new \Exception('file不存在');
        }
    }
    public static function getAll($file){
        if(isset(self::$fileMap[$file])){
            return self::$fileMap[$file];
        }
        $filePath = CORE.'/config/'.$file.'.php';
        if(is_file($filePath)){
            $config = include $filePath;
            self::$fileMap[$file] = $config;
            return $config;
        }else{
            throw new \Exception('file不存在');
        }
    }
}