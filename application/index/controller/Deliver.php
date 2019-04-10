<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\index\controller;

use app\index\model\Bill;
use app\index\model\Shebei;
use app\index\controller\Base;
use think\Db;


class Deliver extends Base
{
    public function deliver()
    {
        $this->checkLogin();
        return $this->fetch();
    }

    public function getSelect()
    {
        $post = input();
        if ($post) {
            $res = Db::name('shebei')->where('type', $post['areaID'])->find();
            $data = Shebei::all(['parent_id' => $res['id']]);
            return json($data);
        } else {
            $res = Shebei::all(['parent_id' => '0']);
            return json($res);
        }

    }

    public function index()
    {
        return $this->fetch();
    }

    public function save()
    {
        $post = input();
        $bill = new Bill($post);
        $res = $bill->save();
        if ($res)
        {
            return json(['data' => '提交成功' ,'status' => '1']);
        }else
        {
            return json(['data' => '提交失败' ,'status' => '0']);
        }

    }
    }