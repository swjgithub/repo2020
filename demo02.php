<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * 创建类的属性和方法
 */
class Animal
{
	public $name;
	public $age;
	public $color;
	public function __construct($name,$age,$color) {
		$this->name=$name;
		$this->age=$age;
		$this->color=$color;
	}
	public function getInfo(){
		echo "动物名称：".$this->name."<br>";
		echo '动物颜色：'.$this->color.'<br>';
		echo '动物年龄：'.$this->age;
	}
}
$dog=new Animal("狗",3,"black");
$dog->getInfo();
echo "<hr>";
$cat = new Animal("猫",4,"yellow");
$cat->getInfo();

class Bird extends Animal
{
	public function getInfo(){
		echo "你建立对了";
	}
}
echo "<hr>";
$fb=new Bird('白鸽',2,'白色');
$fb->getInfo();

