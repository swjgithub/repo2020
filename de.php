<?php
/**
 * 单例模式
 * 工厂模式
 * 注册树模式
 */
//单例模式

class Site
{
    public $siteName; //属性
    protected static $instance = null; //本例的静态实例
    private function __construct($siteName)
    {
//禁用构造方法
        $this->siteName = $siteName;
    }
    public static function getInstance($siteName = "PHP")
    {
//获取本例唯一实例
        if (!self::$instance instanceof self) {
            self::$instance = new self($siteName);
        }
        return self::$instance;
    }
}

//工厂模式来生成本类的单一实例
class Factory
{
    //创建指定类的实例
    public static function create()
    {

        return Site::getInstance($siteName);

    }
}

//对象注册树
/**
 * class Register
 * 1.注册：set(),把对象挂到树上
 * 2.获取：get(),把对象取下来用
 * 3.注销：_unset(),把对象删除
 */
class Register
{
    protected static $objects = []; //创建对象池，数组
    public static function set($alias, $obj)
    {
//生成对象并挂到树上
        self::$objects[$alias] = $obj;
    }
    public static function get($alias)
    {
        //从树上取下对象
        return self::$objects[$alias];
    }
    public static function _unset($alias)
    {
        //销毁对象
        unset(self::$objects[$alias]);
    }
}
Register::set('site', Factory::create("Hello World")); //把Site类的实例，放到对象池中
$obj = Register::get('site'); //从对象池中取出对象
var_dump($obj);
echo "<hr>";
echo $obj->siteName;
////////////////////////////
///

trait Eat
{
    public function eat()
    {
        echo '我有吃的技能';
    }
}

class A
{
    use Eat;
    public function ha()
    {
        //...
    }
}
class B
{
    use Eat;
    public function hi()
    {
        //...
    }
}

//////trait 优先级///////////
class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();


////////////////////
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!';
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello();

////////多个 trait///////////
///
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();