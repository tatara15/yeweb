<?php
namespace app\admin\model;
use think\Model;
//管理员模型
class Admin extends Model{
    /**
     * 实现用户登录的模型方法
     * @param array 用户数据
     * @return boolean 正确为true 错误false
     */
    public function login($data){
        
        //判断用户名是否存在
        if(model('Admin')->where(['username'=>$data['username']])->get()){
            return 1;
        }
        // return model('Admin')->where(['username'=>$data['username']])->get();
        return 2;
    }
}