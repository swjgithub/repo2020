<?php
namespace app\index\controller;
/**
 * 静态代理Facade的实现
 */
use app\facade\Test;
class Demo03
{
	//传统调用另一个类库中的方法
	public function getName(){
		$obj=new \app\common\Test;
		echo $obj->hello("ThinKPHP");
	}
	//使用静态代理来实现方法调用
	public function getName01(){
	   echo Test::hello("My Demo");
	}
	//使用依赖注入实现方法调用
	public function getName02(\app\common\Test $hi){
		echo $hi->hello("Linda");
	}
}