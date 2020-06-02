<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * trait 优先级
 * 自身的方法>trait引入的方法>继承的方法
 */

class Base {
	public function sayHello(){
		echo "Hello Base!";
	}
}

trait Say
{
	public function sayHello(){
		parent::sayHello();
		echo "Hello World";
	}
}

class MyHello extends Base
{
	use Say;
	public function sayHello(){
		echo "Hello MyHello";
	}
}

$my=new MyHello();
$my->sayHello();