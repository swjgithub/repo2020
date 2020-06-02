<?php
namespace app\index\controller;

use think\facade\View;

class View02
{
    public function getmsg()
    {
        View::assign('data', "hello Thinkphp");
        return View::fetch();
    }
    public function dismsg()
    {
        return View::display("Hello PHP");
    }
    public function printvar(){
    	//数组
    	View::assign('data',['name'=>'Linda','age'=>20,'salary'=>2000]);
    	//常量
    	define('PI',3.1415);

    	//对象
    	$obj=new \stdClass();
    	$obj->course="ThinkPHP";
    	$obj->grade=85;
    	$obj->teacher="peter";
    	
    	//模板赋值
    	view::assign('obj',$obj);
    	//渲染到模板
    	return View::fetch();
    }

}
