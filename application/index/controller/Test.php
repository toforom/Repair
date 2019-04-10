<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\index\controller;

use app\index\model\Shebei;
use think\Controller;
use app\admin\model\Student;
use think\Db;



class Test extends Controller
{
    public function index()
    {
       $res = Db::name('student')->where(['id' => '1'])->find();
       echo $res['student_name'];

    }

    public function test()
    {
        $list = Shebei::whe
        var_dump($list);
    }

}