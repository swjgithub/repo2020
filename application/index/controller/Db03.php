<?php
namespace app\index\controller;
use think\Db;
/**
 * 原生查询（读操作）
 * 使用Db::query()方法来实现
 */

class Db03
{
	public function query(){
		//读操作
		$sql="Select * from `tb_student` where `id` in (8,9,10)";
		$res=Db::query($sql);
		dump($res);
	}

}