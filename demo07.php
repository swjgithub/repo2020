<?php
/**
 * __toString使用
 */
class Test
{
	public $foo;
	public function __construct($foo){
		$this->foo=$foo;
	}
	public function __toString(){
		return $this->foo;
	}
}


$obj=new Test("Hello");

echo $obj->foo;
echo "<hr>";
// var_dump($obj);
echo $obj;
