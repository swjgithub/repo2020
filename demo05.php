<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * 多态的实现
 */

abstract class animal {
	abstract public function shout();
}

class Dog extends animal {
	public function shout(){
		echo "汪汪....<br>";
	}
}

class Cat extends animal {
	public function shout(){
		echo "喵喵.....</br>";
	}
}

function animalShout($obj){
	if($obj instanceof animal){
		$obj->shout();
	}else{
		echo "Erro:对象错误";
	}
}

$cat=new Cat();
$dog=new Dog();
animalShout($cat);
animalShout($dog);
animalShout($bird);