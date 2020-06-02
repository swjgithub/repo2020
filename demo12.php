<?php
header("Content-Type:text/html;charset=utf-8");

class My
{
	// 定义一个常量
	const PI="3.1415926";
	function getValue(){
		echo self::PI;
	}
}

$obj=new My();
$obj->getValue();
echo "<hr>";
var_dump(My::PI);

