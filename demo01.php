<?php
/**
 * 创建类
 */

class Animal
{
	public $name;
	private $age;
	public $color;

	public function __construct($name,$age){
		$this->name=$name;
		$this->age=$age;
	}
	public function getInfo(){
		echo "动物名称：".$this->name;
		echo "动物名称：".$this->age;
	}

}

$instance = new Animal("猫",5);
$instance->getInfo();
$dog=new Animal("狗",3);

$dog->getInfo();
echo "<hr>";
// var_dump($dog->age);

var_dump($dog->name);