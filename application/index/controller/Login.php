<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\Db;
use think\Request;
use app\admin\model\Student;
use think\Session;

class Login extends Base
{
    public function login()
    {
//        $this->isLogin();
        return $this->fetch();
    }

    /*
     * @param $request 传递过来的账号密码组成的对象
     */
    public function check(Request $request)
    {
        $post = input();
        if (!captcha_check($post['verify']))
        {
            return json(['status' => '2' , 'data' => '验证码错误']);
        }
        $res = Student::get(['student_sno' => $post['username'] , 'student_password' => $post['password']]);

        if ($res)
        {
            Session::set('user_idd',$res['student_name']);
            Session::set('user_id',$res['student_sno']);
            return json(['status' => '1' , 'data' => '登录成功']);
        }else
        {
            return json(['stauts' => '0' , 'data' => '登录失败']);
        }
    }

    public function login_out()
    {
        $res = Session::delete('user_id');
        if (!$res)
        {
            $this->success('退出成功！','login/login');
        }else
        {
            $this->error('退出失败！');
        }
    }

}