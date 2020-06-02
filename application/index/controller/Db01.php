<?php
namespace app\index\controller;

use think\Db;

/**
 * 1.查找数据表中的单条记录
 * 2.使用方法：find()
 *
 */
class Db01
{
    public function find()
    {
        $res = Db::table("tb_student")
            ->where('id', '=', 2)
            ->find();
        dump($res);
    }
    public function find1()
    {
        $res = Db::table("tb_student")
            ->where('id', 2)
            ->field("id,name,course,grade")
            ->find();
        dump($res);

    }
    public function find2()
    {
        $res = Db::table("tb_student")
            ->where('id', 2)
            ->field(['id as 序号', 'name as 姓名'])
            ->find();
        dump($res);
    }

    public function select()
    {
        $res = Db::table("tb_student")
            ->field('id,name,course,grade')
            ->where([
                ['grade', '>', 60],
                ['course', '=', 'ThinkPHP'],
            ])
            ->select();
        if (empty($res)) {
            return "没有记录";
        } else {
            foreach ($res as $row) {
                dump($row);
            }
        }
    }

}
