<?php
class Sort{
    public $arr = [6,4,1,7,9,0,2,4,3,2,1,4,5,6,78,4,23,2,1];
    /**
     * @author pwq
     * mp sort
     * type:asc
     * @param array
     */
    public static function mpSort($arr = array()){
        for ($i = count($arr) - 1 ; $i > 0 ; $i -- ){
            for ($k = 0;$k < $i ; $k ++){
                if($arr[$k] > $arr[$k+1]){
                    $m = $arr[$k+1];
                    $arr[$k+1] = $arr[$k];
                    $arr[$k] = $m;
                }
            }
        }
        var_dump($arr);
    }

    /**
     * @author pwq
     * xq sort
     * @param array
     */
    public static function xzSort($arr = array()){
        echo count($arr);
        for ($i = count($arr) - 1;$i > 0;$i--){
            $maxIndex = 0;
            for ($k = 1;$k <=$i;$k++){
                $arr[$maxIndex] < $arr[$k] && $maxIndex =  $k ;
            }
            $m = $arr[$i];
            $arr[$i] = $arr[$maxIndex];
            $arr[$maxIndex] = $m;
        }
        var_dump($arr);
    }

    /**
     * @param $arr
     * @author pwq
     * cr sort
     * @param array
     */
    public static  function crSort($arr = array()){
        for ($i = 1;$i <= count($arr) - 1 ; $i ++){
            for ($k = $i;($k >0 && $arr[$k] < $arr[$k-1]); $k--){
                $m = $arr[$k];
                $arr[$k] = $arr[$k-1];
                $arr[$k-1] = $m;
            }
        }
        var_dump($arr);
    }

    /**
     * @author pwq
     * xe sort
     * @param array
     */
    public static function xeSort($arr = array()){
        // 将$arr按升序排列
        $len = count($arr);
        $f = 3;// 定义因子
        $h = 1;// 最小为1
        while ($h < $len/$f){
            $h = $f*$h + 1; // 1, 4, 13, 40, 121, 364, 1093, ...  4
        }
        while ($h >= 1){  // 将数组变为h有序
            for ($i = $h; $i < $len; $i++){  // 将a[i]插入到a[i-h], a[i-2*h], a[i-3*h]... 之中 （算法的关键
                for ($j = $i; $j >= $h;  $j -= $h){
                    if ($arr[$j] < $arr[$j-$h]){
                        $temp = $arr[$j];
                        $arr[$j] = $arr[$j-$h];
                        $arr[$j-$h] = $temp;
                    }
                    echo $j;echo '<br/>';
                    echo $j-$h;echo '<br/>';
                    print_r($arr);echo '<br/>'; // 打开这行注释，可以看到每一步被替换的情形
                }
            }
            echo 'out';
            echo "</br>";
            $h = intval($h/$f);
        }
        return $arr;
    }

}
//$arr = [6,4,1,7,9,0,2,4,3,2,1,4,5,6,78,4,23,2,1,4];  4
$arr = [5,4,3,2,1];
Sort::xeSort($arr);
?>