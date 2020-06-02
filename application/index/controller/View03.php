<?php
namespace app\index\controller;

use think\Controller;

class View03 extends Controller
{
	public function get_data(){
		$data=[
			'name'=>'Frank',
			'age'=>18
		];
		$this->view->assign('data',$data);
		return $this->view->fetch();

	}
	public function send(){
		$data=[
			['id'=>1,'name'=>'peter','grade'=>80],
			['id'=>2,'name'=>'frank','grade'=>70],
			['id'=>3,'name'=>'linda','grade'=>50],
			['id'=>4,'name'=>'Jhon','grade'=>40]
		];
		dump($data);
		$this->view->assign('list',$data);
		return $this->view->fetch();
	}
}