<?php
namespace app\index\controller;

/**
 * 利用Db.php入口文件中的connect()方法连接数据库
 */
use think\Db;

class Demo08
{
    public function conn1()
    {
        $dbconfig=[
            'type'     => 'mysql',
            'hostname' => '127.0.0.1',
            'username'  => 'root',
            'password' => 'root',
            'database' => 'db_demo',
        ];
        $db=Db::connect();
// dump($db);
        return $db->table('tb_student')->where('id',3)->value('name');
    }

}
