<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/30
 * Time: 14:52
 */
namespace app\admin\model;


use think\Model;

class student extends Model
{
    public function getStudentStatusAttr($value)
    {
        switch ($value){
            case -1 :
                return '禁用';
            case 1 :
                return '待审核';
            default:
                return '正常';
        }
    }

}