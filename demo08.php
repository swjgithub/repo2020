<?php
/**
 * __clone()方法
 *
 */

class Animal
{
	private $name;
	private $color;
	private $age;
	public function __construct($name,$color,$age){
		$this->name=$name;
		$this->color=$color;
		$this->age=$age;
	}
	public function getInfo(){
		echo '名字：'.$this->name.'颜色：'.$this->color;
	}
	public function __clone(){
		$this->name="小狗";
		$this->color="黄色";
		$this->age=1;
	}
}
$pig=new Animal('小猪','黑色',1);
$dog=clone $pig;
$dog->getInfo();