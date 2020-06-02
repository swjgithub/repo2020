<?php
class A
{
    public static function who()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        self::who();
        static::who();  //后继静态绑定
    }
}

class B extends A
{
	public static function who(){
		echo __CLASS__;
	}
}

B::test();

