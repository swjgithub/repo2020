<?php
namespace app\index\controller;

use app\index\model\Article;

/**
 * 根据模型实现数据表的写操作（CRUD)
 */
class Demo12
{
    //使用模型的静态方法：create(),返回的是模型的对象实例
    public function create()
    {
        $data = [
            'title'   => '美国公布禁入实体名单',
            'content' => '华为入列',
        ];
        $rs = Article::create($data);
        dump($rs);
    }
    //使用非常静态方法save()，实现插入记录
    public function save()
    {
        $tab = new Article;
        // $tab->title="华为新品来了";
        // $tab->content="Nova7";
        // $tab->save();
        $tab->save(
            ['title'  => '小米新品上市',
             'content' => '红米来了',
            ]);
        return $tab->id;
    }
    //多条插入saveAll()
    public function saveAll(){
    	$list=[
    		['title'=>'小米新闻','content'=>'新品发布'],
    		['title'=>'华为新闻','content'=>'华为系统上市']
    	];
    	$tab=new Article;
    	$tab->saveAll($list);
    }
}
