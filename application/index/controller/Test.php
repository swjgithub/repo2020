<?php
/*
测试专用
 */
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\UserModel;
use think\facade\Request;

class Test extends Base
{
    public function test01()
    {
        // 是否批量验证
        // protected $batchValidate = true;

        $data = [
            'name'     => '20959342',
            'email'    => 'fds@af.com',
            'mobile'   => '543245235',
            'password' => '134124',
            'confirm'  => '13412422',
        ];

        $rule = 'app\common\validate\UserValid';
        $res  = $this->validate($data, $rule);
        // dump($res);
        if (true != $res) {
            //false
            return ['status' => -1, 'message' => $res];
        } else {
            //true
            //将数据写到数据表中
        }

        return $res;

    }

    public function test02()
    {
        // return  UserModel::table('tb_user')
        // ->where('id',1)
        // ->select();
        // return UserModel::get(1);
        UserModel::create([
            'name'     => 'thinkphp',
            'email'    => 'thinkphp@qq.com',
            'mobile'   => '3421412',
            'password' => "dkddk",
        ]);

    }
    public function test03()
    {
        $data = UserModel::get(50);
        dump($data);

    }
    public function test05()
    {

        return $this->fetch();
    }
/////////////////

    //定义一个方法名upload_img，和view/TestImage文件夹下面的upload_img同名，提交信息时匹配文件
    public function upload()
    {
        //判断是否是post 方法提交的
        if (Request::isPost()) {
            $data = Request::post();
            $file = Request::file('image');
            if ($file) {
                $info = $file->validate([
                    'size' => 100000,
                    'ext'  => 'jpeg,jpg,png,gif',
                    //动态方法move 从本地将文件移动至服务器
                ])->move('uploads/');
                // halt($info);
                if ($info) {
                    $data['title_img'] = $info->getSaveName();
                    // halt( $data['title_img']);
                } else {
                    //file->getError()包含上传错误信息
                    $this->error($file->getErrot());
                }
            }

        }

    }

}
