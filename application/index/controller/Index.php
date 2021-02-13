<?php
namespace app\index\controller;

use app\common\controller\Base;
use app\common\model\ArtCateModel;
use app\common\model\ArticleModel;
use think\facade\Request;

class Index extends Base
{
    public function index()
    {
        // $rs = ArticleModel::all(function ($query) {
        //     $query->order('id', 'desc');
        // })
        $rs = ArticleModel::order('id', 'desc')->paginate(2);
        // halt($rs);
        if ($rs) {
            $this->view->assign('artList', $rs);
        }
        $this->assign('title', '技术热点欢迎您');
        return $this->fetch();
    }

    // public function test01()
    // {
    //     $this->assign('title','ThinkPHP');
    //     return $this->fetch();
    // }
    //发表热点文章界面
    public function insert()
    {
        //登录才能发表
        $this->isLogin();
        //设置面面标题
        $this->view->assign('title', '发表热点');
        //获取栏目标题
        $cateList = ArtCateModel::all();
        // halt($cateList);
        if (count($cateList) > 0) {
            //将查到的信息赋值给模板变量cataList
            $this->view->assign('cateList', $cateList);
        } else {
            $this->error("请添加本项目", "index/index");
        }
        //渲染发布页面
        return $this->fetch('insert');

    }

    public function save()
    {
        if (Request::isPost()) {
            $data = Request::post();
            // halt($data);
            $res = $this->validate($data, 'app\common\validate\ArticleValid');
            // halt();
            if (true !== $res) {
                echo '<script>alert("' . $res . '");history.back(-1);</script>';
            } else {
                //取上传图片信息，文件上传以public为起始目录
                // halt($_FILES['title_img']['name']);
                if (!empty($_FILES['title_img']['name'])) {
                    $file = Request::file('title_img');
                } else {
                    return $this->error('请添加图片', 'index/insert');
                }
                //返回的是文件对象，$file还是在本地
                //file 包含当前文件所有本地信息
                $info = $file->validate([
                    'size' => 100000,
                    'ext'  => 'jpeg,jpg,png,gif',
                    //动态方法move 从本地将文件移动至服务器
                ])->move('uploads/');
                // halt($info);
                //包含所有在服务器上的文件信息（文件名已被修改）
                if ($info) {
                    $data['title_img'] = $info->getSaveName();
                } else {
                    //file->getError()包含上传错误信息
                    $this->error($file->getError());
                }
                //将数据写到数据库中
                $data['user_id'] = session('user_id');
                // halt(  $data['user_id']);
                if (ArticleModel::create($data, true)) {
                    $this->success('文章发布成功', 'index/index');
                } else {
                    $this->error('文章保存失败！');
                }

            }
        } else {
            $this->erro('请求类型不对', 'index/insert');
        }

    }
}
