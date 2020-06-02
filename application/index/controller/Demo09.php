<?php
namespace app\index\controller;

/**
 * 利用DSN字符串进行连接数据库
 * DSN字符串格式：数据库类型：//用户名：用户密码@服务器地址：端口/数据库名#字符集
 * Db::connect()
 */
use think\Db;

class Demo09
{
    public function conn2()
    {
        $dsn = 'mysql://root:root@127.0.0.1:3306/db_demo#utf8';
        return Db::connect($dsn)->table('tb_student')
            ->where('id', 1)->value('name');
    }
}
