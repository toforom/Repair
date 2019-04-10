<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\admin\controller;
use think\Session;
use think\Controller;


class Base extends Controller
{
    protected function _initialize()
    {   
        parent::_initialize();
    }

    protected function checkLogin()
    {
        if(!Session::has('user_id'))
        {
            $this->error('非法登录','login/login');
        }
    }

    protected function isLogin()
    {
        if (Session::has('user_id'))
        {
            $this->error('请勿重复登录','index/index');
        }
    }
}