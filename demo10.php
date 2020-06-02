<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * static静态属性和方法
 */

class Animal
{
	private $name;
	private $color;
	private $age;
	private static $sex="雄性";
	public function __construct($name,$color,$age) {
		$this->name=$name;
		$this->color=$color;
		$this->age=$age;
	}
	public function getInfo(){
		echo "动物名称:".$this->name."|动物颜色:".$this->color."|动物年龄：".$this->age;
	}
	public static function getSex(){
		echo "动物的性别为：".self::$sex;	
	}
}

$cat=new Animal("猫","花色",1);
$cat->getInfo();
echo "<hr>";
$cat->getSex();
echo "<hr>";
// var_dump(Animal::$sex);
Animal::getSex();