<?php
namespace app\index\controller;

use think\Controller;

class Demo16 extends Controller
{
    public function hello()
    {
        $hi = "Hello ThinkPHP455235";
        $this->view->assign('data', $hi);
        return $this->view->fetch();
    }
    public function index()
    {
    	$this->view->assign('home','这是主页');
    	return $this->view->fetch();
    }
}
