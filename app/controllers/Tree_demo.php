<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2019/5/14
 * Time: 13:47
 */
class Tree_demo{
    public $left;
    public $right;
    public $val = null;
    function __construct()//$l,$r,$v
    {
        /*$this->left = $l;
        $this->right=$r;
        $this->val = $v;*/
    }
}
function demo(){
    $t = new Tree_demo();
    $arr = [4,5,9,7,23,12,64,3];
    foreach ($arr as $v){
        demo2($t,$v);
    }
    print_r($t);
}
function demo2(&$tree,$v){
    if($tree == null){
        $tree = new Tree_demo();
        $tree->val = $v;
    }elseif($tree->val > $v){
        demo2($tree->left,$v);
    }else{
        demo2($tree->right,$v);
    }
}
demo();