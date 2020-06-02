<?php
namespace app\index\controller;

use app\index\model\Student;
use think\Controller;

class View04 extends Controller
{
    public function student()
    {
        $rs = Student::order('id','desc')->paginate(4);
        $this->view->assign('title','ThinkPHP 视图学习');
        $this->view->assign('list', $rs);
        return $this->view->fetch();
    }
}
