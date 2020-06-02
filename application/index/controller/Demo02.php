<?php
namespace app\index\controller;

class Demo02
{
    public function bindClass()
    {
        //将类放入容器中，命名为sw
        \think\Container::set('sw', '\app\common\Sword');
        //从容器中取出sw类
        $sw = \think\Container::get('sw');
        return $sw->goAhead();
    }

    public function bindClosure(){
    	//将闭包放入容器，命名为demo
    	\think\Container::set('demo',function(){
    		return "ThinkPHP123";
    	});
    	//将闭包取出
    	return \think\Container::get('demo');
    }

     public function bindClosure01(){
    	//将闭包放入容器，命名为demo
    	\think\Container::set('demo',function($domain){
    		return "ThinkPHP123".$domain;
    	});
    	//将闭包取出
    	return \think\Container::get('demo',['domain'=>"tp51.io"]);
    }
}


