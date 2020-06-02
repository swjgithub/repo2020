<?php
namespace app\index\controller;

use think\Db;

/**
 * 原生写操作
 * 使用Db::execute()方法来实现
 */

class Db04
{
    public function update()
    {
        $sql = "update `tb_student` set `name`='Jhon' where `id`=5";
        $res = Db::execute($sql);
        return $res;
    }
    public function insert()
    {
        $sql = "insert `tb_student` set `name`='李四',`email`='lisi@qq.com',`age`=20,`course`='ThinkPHP',`grade`=89";
        $sql .= " ,`create_time` = " . time() . ",`update_time`=" . time();
        $res = Db::execute($sql);
        return $res;
    }
    public function delete()
    {
        $sql = "delete from `tb_student` where `name`='张三'";
        $res = Db::execute($sql);
        return $res;
    }

}
