<?php
namespace app\index\controller;

use app\index\model\Article;

/**
 * 使用模型实现删除
 */
class Demo14
{
    //使用模型中的静态方法destroy()
    public function destroy()
    {
        $rs = Article::destroy(5);
        dump($rs);
    }
    //非静态方法实现删除delete()
    public function delete(){
    	$rec=Article::get(7);
    	$rec->delete();
    }
}
