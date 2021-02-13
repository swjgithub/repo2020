<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\UserModel;
use think\facade\Request;
use think\facade\Session;

class User extends Base
{

    public function register()
    {
        $this->assign('title', '用户注册');
        return $this->fetch();
    }

    public function insert()
    {
        // 方法一：form
        // if (Request::instance()->isPost()){
        // $data=Request::except('confirm','post');
        // $rs=UserModel::create($data,true);
        // }
        // 方法二：ajax
        if (Request::isAjax()) {
            //验证数据
            $data = Request::post();
            //验证规则
            $rule = 'app\common\validate\UserValid';
            $res  = $this->validate($data, $rule);

            if (true !== $res) {
                return ['status' => -1, 'message' => $res];
            } else {
                // $data = Request::except('confirm', 'post');
                //create方法的第二个参数可以传入允许写入的字段列表（传入true则表示仅允许写入数据表定义的字段数据）
                if (UserModel::create($data, true)) {
                    return ['status' => 1, 'message' => '黄喜, 注册成功了！'];
                } else {
                    return ['status' => 0, 'message' => "注册失败"];
                }
            }

        } else {
            $this->error("提交方法不正确", "register");
        }
    }

    public function login()
    {
        $this->logined();
        return $this->view->fetch('login', ['title' => '用户登录']);
    }

    public function loginCheck()
    {
        if (Request::isAjax()) {
            //验证数据
            $data = Request::post();
            //验证规则
            $rule = [
                'name'     => 'require|chsAlphaNum',
                'password' => 'require|length:6,20|alphaNum',
            ];
            $res = $this->validate($data, $rule);

            if (true !== $res) {
                return ['status' => -1, 'message' => $res];
            } else {
                //use($data)表示引用闭包外部变量
                $result = UserModel::get(function ($query) use ($data) {
                    $query->where('name', $data['name'])
                        ->where('password', sha1($data['password']));
                });
                if (null == $result) {
                    return ['status' => 0, 'message' => '用户名或密码不正确，请检查！'];
                } else {
                    Session::set('user_id', $result->id);
                    Session::set('user_name', $result->name);
                    return ['status' => 1, 'message' => "恭喜，登录成功！"];
                }
            }
        } else {
            $this->error("提交方法不正确", "login");
        }

    }
    public function logout()
    {
        Session::delete('user_id');
        Session::delete('user_name');
        //Session::clear();
        $this->success("退出成功！", 'index/index');
    }
}
