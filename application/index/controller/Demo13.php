<?php
namespace app\index\controller;
use app\index\model\Article;
/**
 * 使用模型实现更新操作
 */
class Demo13
{
	//使用模型中的静态方法update()
	public function update(){
		// $rs=Article::update([
		// 	'id'=>6,'title'=>'中兴新闻'
		// ]);
		// return $rs;
		$rs=Article::where('id',6)
		->update(['title'=>'360新闻']);
		return $rs;
	}
	//非静态方法save()
	public function save(){
		$rec=Article::get(6);
		$rec->title="淘宝新闻";
		$rec->save();
		echo $rec->id;
	}
	public function saveAll(){
		$tab=new Article;
		$data=[
			['id'=>'5','title'=>"小米新闻1"],
			['id'=>'4','title'=>'青年人的选择']
		];
		$rs=$tab->saveAll($data);
		dump($rs);
	}
}