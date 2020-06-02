<?php
namespace app\index\controller;

/**
 * 3.使用依赖注入方法，完成请求Request类的调用
 */

class Demo06
{
    public function test(\think\Request $req)
    {
        dump($req->get());
    }
}
