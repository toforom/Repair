<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\admin\controller;
use app\index\model\Bill;
use think\Controller;
use think\DB;

class Bil extends Controller
{
    public function index()
    {
        // 查询状态为1的用户数据 并且每页显示10条数据
        $list = Bill::where('status',0)->paginate(1);
// 把分页数据赋值给模板变量list
        $this->assign('list', $list);
// 渲染模板输出
        return $this->fetch();
    }

}