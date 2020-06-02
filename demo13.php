<?php
header("Content-Type:text/html;charset=utf-8");

/**
 * trait技术：
 * 解决的问题：
 * 1.解决PHP中无法实现多继承
 * 2.代码复用
 * 3.trait不是类，内部无法使用静态成员，也不使用const 常量，还不能创建实例
 * 4.使用方法：user trait类名
 */

trait Eat
{
	public function eat(){
		echo "吃的技能";
	}
}

trait Work
{
	public function doSomething(){
		echo "做事的技能";
	}
}

class Horse
{
	use Eat;
	use Work;
}

$hrs=new Horse();

$hrs->eat();
echo "<hr>";
$hrs->doSomething();