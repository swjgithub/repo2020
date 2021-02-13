<?php
/**
 * 基础控制器
 * 必须继承自think\Controller
 */
namespace app\common\controller;

use think\Controller;
use think\facade\Session;

class Base extends Controller
{
    /**
     * 初始化方法
     * 创建常量、公共方法
     * 在所有方法执行前被调用
     */
    protected function initialize()
    {

    }
    protected function logined()
    {
        if (Session::has('user_id')) {
            $this->error("您已登录过了，请不要重复操作！，", "index/index");
        }
    }

    public function isLogin()
    {
        if (!Session::has('user_id')) {
            $this->error("您还没有登录呢！", "user/login");
        }
    }
}
