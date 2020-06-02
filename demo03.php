<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * 创建接口并实现接口
 */
interface animal
{
	function run();
	function shout();
}

//定义dog类，实现animal接口

class Dog implements animal {
	public function run(){
		echo '小狗在奔跑<br>';
	}
	public function shout(){
		echo '汪汪.....<br>';
	}
}

class Cat implements animal {
	public function run(){
		echo '小猫在奔跑<br>';
	}
	public function shout(){
		echo '喵喵......<br>';
	}
}

$dog=new Dog();
$dog->run();
$dog->shout();

$cat=new Cat();
$cat->run();
$cat->shout();