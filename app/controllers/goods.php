<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018/11/21
 * Time: 14:42
 */
class goods{
    private $goodsName = '1' ;
    private $goodsPrice = 'hahahah';
    private $goodsNum = 1;

    function __get($name)
    {
        return $this->$name;
        // TODO: Implement __get() method.
    }
    function __set($name, $value)
    {

        // TODO: Implement __set() method.
    }

    /**
     * @return mixed
     */
    public function getGoodsName()
    {
        return $this->goodsName;
    }

    /**
     * @param mixed $goodsName
     */
    public function setGoodsName($goodsName)
    {
        $this->goodsName = $goodsName;
    }

    /**
     * @return mixed
     */
    public function getGoodsPrice()
    {
        return $this->goodsPrice;
    }

    /**
     * @param mixed $goodsPrice
     */
    public function setGoodsPrice($goodsPrice)
    {
        $this->goodsPrice = $goodsPrice;
    }

    /**
     * @return mixed
     */
    public function getGoodsNum()
    {
        return $this->goodsNum;
    }

    /**
     * @param mixed $goodsNum
     */
    public function setGoodsNum($goodsNum)
    {
        $this->goodsNum = $goodsNum;
    }
    function __isset($name)
    {
        // TODO: Implement __isset() method.
        return isset($name);
    }
    function __toString()
    {
        // TODO: Implement __toString() method.
        return '22222';
    }
    function __sleep()
    {
        // TODO: Implement __sleep() method.
        return array('goodsName','goodsPrice');
    }
    function __wakeup()
    {
        // TODO: Implement __wakeup() method.
        echo 'wake is used';
    }
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo 'destruct is used';
    }

}
$goodsObj = new goods();
$a =  serialize($goodsObj);
print_r(unserialize($a));