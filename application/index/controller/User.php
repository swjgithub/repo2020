<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\UserModel; //
use app\common\validate\User as UserValidate;
use think\facade\Request;
use think\facade\Session;

class User extends Base
{
    public function register()
    {
        $this->view->assign('title', '用户注册');
        return $this->view->fetch();
    }

    public function insert()
    {
        if (Request::isAjax()) {
            // 获取数据
            $data = Request::post();
            // 进行校验
            $rules = new UserValidate;
            $rs    = $this->validate($data, $rules->rule_reg);
            //处理验证结果
            if ($rs === true) {
                // 获取发送端的数据
                $data = Request::except('password_confirm');
                //写入数据库
                $res = UserModel::create($data); //
                // return $res;
                //写入数据库的反馈
                if ($res) {
                    return ['status' => 1, 'message' => '注册成功'];
                } else {
                    return ['status' => -1, 'message' => '写入失败'];
                }
            } else {
                return ['status' => 0, 'message' => '验证没有通过,引发原因：' . $rs];
            }

        }
    }
    public function login()
    {
        //判断是否登录
        $this->logined();

        $this->view->assign('title', '用户登录');
        return $this->view->fetch();
    }

    public function loginCheck()
    {

        if (Request::isAjax()) {
            $data  = Request::post();
            $rules = new UserValidate;
            $rs    = $this->validate($data, $rules->rule_login);
            // return $rs;

            if ($rs !== true) {
                return ['status' => 0, 'message' => '输入错误' . $rs];
            } else {
                $res = UserModel::get(function ($jquery) use ($data) {
                    $jquery->where('name', $data['name'])
                        ->where('password', sha1($data['password']));
                });
                // return $res;
                if (null == $res) {
                    return ['status' => -1, 'message' => '登录失败'];
                } else {
                    Session::set('id', $res->id);
                    Session::set('user_name', $res->name);
                    return ['status' => 1, 'message' => '登录成功！'];
                }

            }

        }
    }
    public function logout()
    {
        if (Session::has('user_name')) {
            Session::delete('user_name');
            $this->success("退出成功", 'index/index/index');
        }
    }

}
