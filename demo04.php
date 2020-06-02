<?php
/**
 * 抽象类及其抽象方法
 * 类:animal
 */
header("Content-type:text/html;charset=utf-8");

abstract class animal {
	abstract public function shout();
}

//定义dog类继承animal类

class Dog extends animal {
	public function shout(){
		echo '汪汪....<br>';
	}
}

$dog=new Dog();
$dog->shout();