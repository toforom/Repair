<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\admin\model\Student;
use think\Session;

class Register extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check(Request $request)
    {
        $map = $request->post();
        $map['quanxian'] = 1;
        $student = new Student($map);
        $res = $student->save();
        if ($res)
        {

            return json(['status' => '1' , 'data' => '注册成功，等待审核']);
        }else
        {
            return json(['status' => '0' , 'data' => '注册失败']);
        }


    }

}