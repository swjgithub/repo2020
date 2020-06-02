<?php
namespace app\index\controller;

use think\Db;

/**
 * 2. 数据库（表）写操作
 * (1)插入insert
 * (2)更新update
 * (3)删除delete
 *
 */

class Db02
{
	//插入写操作
    public function insert()
    {
        /**
         * 单条插入
         * insert()，返回值为新增条数，失败返回false
         *
         */
        $data = [
            'name'        => 'WangHao',
            'email'       => 'henly@126.com',
            'age'         => 24,
            'course'      => "Vue开发实战",
            'grade'       => 78,
            'create_time' => time(),
            'update_time' => time(),
        ];

        // $res=Db::table('tb_student')
        //     ->insert($data);

        // $res=Db::table('tb_student')
        //     ->data($data)->insert();
        // 获取id,分两步：第一步insert，第二步：获取id
        $res = Db::table('tb_student')
            ->insertGetId($data);
        return $res;

    }
    public function insertAll()
    {
        /**
         * 多条插入insertAll
         * 返回的是插入的条数
         */
        $data = [
            ['name' => '张三', 'email' => 'zhang@126.com', 'age' => 20, 'course' => 'ThinkPHP', 'grade' => 90, 'create_time' => time(), 'update_time' => time(),
            ],
            ['name' => '李四', 'email' => 'zhang@126.com', 'age' => 20, 'course' => 'ThinkPHP', 'grade' => 90, 'create_time' => time(), 'update_time' => time(),
            ],
            ['name' => '王五', 'email' => 'zhang@126.com', 'age' => 20, 'course' => 'ThinkPHP', 'grade' => 90, 'create_time' => time(), 'update_time' => time(),
            ],
        ];

        $res = Db::table('tb_student')
            ->insertAll($data);
        return $res;
//
    }
    //更新写操作
    public function update()
    {
        /**
         * 更新一定要有条件
         * 使用update()来完成
         * 如果更新条件是主键，可以直接将条件写到更新数据中，不用使用where()方法
         */
        $data = [
            'id'          => 10,
            'name'        => '李三',
            'update_time' => time(),
        ];

        // $res=Db::table('tb_student')
        //     ->where('id','=',10)
        //     ->update($data);
        $res = Db::table('tb_student')
            ->update($data);
        return $res;
        //UPDATE `tb_student` SET `name` = '李三' , `update_time` = 1590375080 WHERE `id` = 10
    }
    //删除写操作
    public function delete(){
    	/**
    	 * 删除一定要有条件
    	 * 使用的方法是delete()
    	 */
    	// $res=Db::table("tb_student")
    	// 	->where('id','=',7)
    	// 	->delete();
    	$res=Db::table('tb_student')
    		->delete(6);
    	return $res;
    	//DELETE FROM `tb_student` WHERE `id` = 6
    }
}
