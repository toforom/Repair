<?php
// +----------------------------------------------------------------------
// | 控制器作用：
// +----------------------------------------------------------------------
// | 修改人：
// +----------------------------------------------------------------------
// | 修改时间：
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {
        $this->checkLogin();
        return $this->fetch();
    }
    
}