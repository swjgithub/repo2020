<?php
namespace app\index\controller;

/**
 * 依赖注入：解决的是对象做为参数传递的问题
 */

use app\common\Sword;

class Demo01
{
    public function fight()
    {
        $sw = new Sword();
        return $sw->goAhead();
    }
    public function fight01(){
    	$val=new \app\common\Sword();
    	return $val->goAhead();
    }
    public function fight02(Sword $sword){

    	return $sword->goAhead();
    }
    public function fight03(){
    	$sword=new Sword();
    	return $sword->goAhead();
    }
}
