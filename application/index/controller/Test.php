<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\UserModel;

class Test extends Base
{
	public function info(){
		$this->assign("title","ThinkPHP");
		return $this->view->fetch();
	}

	public function get(){
		// return UserModel::all();
		$rs=UserModel::all();
		dump($rs);
	}

	public function savetime(){
		$data=[
			'name'=>'think',
			'email'=>'think@126.com',
			'mobile'=>'13956928533',
			'password'=>sha1('123456')
		];
		$res=UserModel::create($data);
		dump($res);
	}

	public function vali(){
		$rules='app\common\validate\User';
		$data=[
			'name'=>'think444',
			'email'=>'66think@126.com',
			'mobile'=>'13944174356',
			'password'=>'123456',
			'password_confirm'=>'123456',
		];
		$rs= $this->validate($data,$rules);
		dump($rs) ;
	}

	public function pass(){
		$data=[
			'name'=>'thinker',
			'email'=>'thinker@126.com',
			'mobile'=>'19944174356',
			'password'=>'123456'
		];
		$res=UserModel::create($data);
		dump($res);
	}

}