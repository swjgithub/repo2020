<?php
/**
 * tb_user表的验证器
 *
 */
namespace app\common\validate;

use think\Validate;

class UserValid extends Validate {

    protected $rule=[
    	'name|用户名'=>'require|length:5,20|chsAlphaNum',
    	'email|邮箱'=>'require|email|unique:tb_user', //|unique:tb_user
    	'mobile|手机号'=>'require|mobile',
    	'password|密码'=>'require|length:6,20|alphaNum|confirm:confirm'
//'password'=>'require|confirm',会自动验证和password_confirm进行字段比较是否一致，反之亦然。
    ];
}
