<?php
namespace app\index\controller;

use think\Db;

class Demo10
{
	public function conn3(){
		$res=Db::table('tb_student')->where('id','=',2)
			->value('name');
		dump($res);
	}
}



