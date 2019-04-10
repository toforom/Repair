<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\Controller;
use app\admin\model\Student;
use think\Db;
use think\Request;
use app\admin\model\Repairman;


class User extends Controller
{
    public function user_list()
    {
        $res = Student::where('student_status',1)->paginate(2);
        $this->assign('res',$res);
        return $this->fetch();
    }

    public function user_pass()
    {
        $id = Request::instance()->get();
        $res = Student::update(['student_status' => 2 , 'id' => $id['id']]);
        if ($res)
        {
            $this->success('审核通过');
        }else
        {
            $this->error('审核失败');
        }
    }

    public function user_rlist()
    {
        $res = Db::name('repairman')->paginate('3');
        $this->assign('list',$res);
        return $this->fetch();
    }

    public function user_add()
    {
        $post = input();
        if (!$post)
        {
            return $this->fetch();
        }else
        {
            $repariman = new Repairman($post);
            $res = $repariman->save();
        }if ($res)
    {
        return json(['data' => '提交成功' , 'status' => '1']);

    }else
    {
        return json(['data' => '提交失败' , 'status' => '0']);
    }

    }

    public function user_delete()
    {
        $get = input();
        $res = Repairman::destroy($get['id']);
        if ($res)
        {
            return json(['data' => '删除成功' , 'status' => '1']);
        }else
        {
            return json(['data' => '删除失败' , 'status' => '0']);
        }
    }

    public function user_update()
    {
        $get = input();
        if (count($get)==1){
            $rrs = $get['id'];
            $list = Db::name('repairman')->where('id',$rrs )->find();
            $this->assign('list',$list);
            return $this->fetch();
        }else if (Request::instance()->isPost())
        {
            $repairman = new Repairman();
           $res = $repairman->save(['name' => $get['name'] ,'tel' => $get['tel'],'item' =>$get['item']],['id' => $get['id']]);
            if ($res)
            {
                $this->success('更新成功');
            }else
            {
                $this->error('更新失败');
            }
        }


    }


}