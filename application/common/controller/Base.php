<?php
namespace app\common\controller;

use think\Controller;
use think\facade\Session;

/**
 * 基础控制器
 */

class Base extends Controller
{
    /**
     *初始化方法，是在所有控制器其它方法前执行
     */
    protected function initialize()
    {}

    protected function logined()
    {
        if (Session::has('user_name')) {
            $this->error('您已登录过了，请不要重复操作！', 'index/index/index');
        }
    }
}
