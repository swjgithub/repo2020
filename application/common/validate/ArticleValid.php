<?php
/**
 * tb_user表的验证器
 *
 */
namespace app\common\validate;

use think\Validate;

class ArticleValid extends Validate
{
//验证某个字段的值只能是汉字、字母、数字和下划线_及破折号-'chsDash'

    protected $rule = [
        'title|标题'     => 'require|length:5,40',
        'content|热点内容' => 'require',
        'user_id|作者'   => 'require',
        'cate_id|栏目名称' => 'require',
    ];
}
