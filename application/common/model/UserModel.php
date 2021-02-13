<?php
/**
 * tb_user数据表的用户模型
 *
 */

namespace app\common\model;

use \think\Model;

class UserModel extends Model
{
    protected $pk    = 'id';
    protected $table = 'tb_user';
//开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'true';
    protected $createTime         = "create_time";
    protected $updateTime         = 'update_time';
    protected $timeFormat         = 'Y-m-d H:i:s';

//获取器:get字段名Attr
    public function getStatusAttr($value)
    {
        $status = ['1' => '启用', '0' => '禁用'];
        return $status[$value];
    }

    public function getIsAdminAttr($value)
    {
        $status = ['1' => '管理员', '0' => '注册用户'];
        return $status[$value];

    }

//修改器
    public function setPasswordAttr($value)
    {
        return sha1($value);
    }

}
