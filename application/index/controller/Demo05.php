<?php
namespace app\index\controller;

/**
 * 2.利用静态代理使用Request
 */

use think\facade\Request;

class Demo05
{
    public function test()
    {
        dump(Request::get());
       // return Request::get('name');
    }
}
