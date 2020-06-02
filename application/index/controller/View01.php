<?php
namespace app\index\controller;

use think\Controller;

/**
 * 使用的Controller类的方法
 * display():渲染到网页中
 * fetch(): 渲染到模板中
 */
class View01 extends Controller
{
    public function msg()
    {
        $msg = "Hello world!";
        // dump($msg);
        return $this->view->display($msg);
    }
    public function getmsg()
    {
        $msg = "Hello ThinkPHP";
        $this->view->assign('data', $msg);
        return $this->view->fetch();
    }
    public function hello()
    {
        $msg = "Hello PHP";
        $this->assign('msg', $msg);
        return $this->fetch();
    }

}
