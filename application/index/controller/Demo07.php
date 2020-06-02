<?php
namespace app\index\controller;

/**
 * 4.使用Controller类中的属性来完成获取请求Request信息
 * 推荐使用Controller继承，但Controller没有静态代理
 */

use think\Controller;

class Demo07 extends Controller
{
    public function test()
    {
        dump($this->request->get());
    }
}
