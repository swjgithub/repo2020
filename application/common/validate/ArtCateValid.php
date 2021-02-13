<?php
/**
 * tb_article_category表的验证器
 *
 */
namespace app\common\validate;

use think\Validate;

class ArtCateValid extends Validate
{

    protected $rule = [
        'name|栏目名称' => 'require|length:3,20|chsAlpha',

    ];
}
