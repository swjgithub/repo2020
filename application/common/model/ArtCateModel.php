<?php
/**
 * tb_article_category数据表的用户模型
 *
 */

namespace app\common\model;

use \think\Model;

class ArtCateModel extends Model
{
    protected $pk    = 'id';
    protected $table = 'tb_article_category';
//开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'true';
    protected $createTime         = "create_time";
    protected $updateTime         = 'update_time';
    protected $timeFormat         = 'Y-m-d H:i:s';

    protected $auto = []; //无论新增或更新都要设置的字段
    //仅新增时有效
    protected $insert = [
        'create_time',
        'status' => 1,

    ];
    //仅更新时有效
    protected $update = [
        'update_time',
    ];

}
