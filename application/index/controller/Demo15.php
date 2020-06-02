<?php
namespace app\index\controller;

use app\index\model\Student;

class Demo15
{
	public function get(){
		$rs=Student::get(4);
		return $rs;
	}
	public function all(){
		$rs=Student::all();
		dump($rs);
	}
}

