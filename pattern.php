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
    protected static $instance = null; //静态实例
    private function __construct($siteName)
    {
        $this->siteName = $siteName;
    }
    public static function getInstance($siteName = "ThinkPHP")
    {
        //Alt+Ctrl+F sublime Text 3 进行自动格式化快捷键
        if (!self::$instance instanceof self) {
            self::$instance = new self($siteName);
        }
        return self::$instance;
    }
}

// var_dump(Site::getInstance("Hello"));

//工厂模式来生成类的单一实例
class Factory
{
    public static function create()
    {
        return Site::getInstance();
    }
}

// var_dump(Factory::create());


//对象注册树模式
/**
 * class Register
 * 注册：set()
 * 获取：get()
 */
class Register
{
    protected static $objects = []; //创建对象池（树）
    public static function set($alias, $obj)
    {
        self::$objects[$alias] = $obj;
    }
    public static function get($alias)
    {
        return self::$objects[$alias];
    }
    public static function _unset($alias)
    {
        unset(self::$objects[$alias]);
    }
}

//把Site的实例，放到对象树上（池中）
Register::set('site', Factory::create());
$obj = Register::get('site');
var_dump($obj);
echo "<hr>";
var_dump($obj->siteName);
