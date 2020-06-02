<?php
namespace app\index\controller;

use app\index\model\Article;

//模型与数据表article是绑定的
//模型返回的结果是对象
//查询构造器返回结构是数组
class Demo11
{
    public function get()
    {
    	//使用模型进行读操作
        $rs = Article::get(2);
        // $rs=new Article();
        // dump($rs->get(1));
        //使用的是查询构造器
        // $rs = \think\Db::table("article")->where('id', 2)->find();
        // dump($rs instanceof Article);
        return $rs;
    }
    public function find(){
    	$rs=Article::field('id,title')
    		->where('id',2)
    		->find();
    	return $rs;
    }
    public function all(){
    	$rs=Article::all([1,2]);
    	dump($rs);
    }

}
