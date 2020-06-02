<?php
header("Content-Type:text/html;charset=utf-8");
/**
 * __get() & __set()
 */
class Animal
{
	private $name;
	private $color;
	private $age;
//解决获取属性的问题
	function  __get($property_name){
		if(isset($this->$property_name)){
			return $this->$property_name;
		}else{
			return null;
		}
	}
//解决设置值（改变值）的问题
	function __set($property_name,$value){
		$this->$property_name=$value;
	}
//解决外部无法使用isset的问题
	function __isset($property_name){
		return isset($this->$property_name);
	}
//解决无法利用unset删除的问题
	function __unset($property_name){
		unset($this->$property_name);
	}
}

$pig= new Animal();
$pig->name="小猪";
echo $pig->name;
echo "<hr>";
echo var_dump(isset($pig->name));
unset($pig->name);
echo "<hr>";
echo var_dump(isset($pig->name));



