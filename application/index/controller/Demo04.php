<?php
namespace app\index\controller;

/**ctrl+all+f
 * 获取请求信息——Request类的使用
 * 1.传统使用Request类的方法
 */

use think\Request;

class Demo04
{
    public function test()
    {
        $req = new Request();
        dump($req->get());
    }
}
