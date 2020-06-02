<?php
namespace app\index\controller;

use app\index\model\Student;
use think\Controller;

class Temp extends Controller
{
    public function get_data()
    {
        $data = Student::paginate(3);
        $this->view->assign('data', $data);
        return $this->view->fetch();
    }
}
