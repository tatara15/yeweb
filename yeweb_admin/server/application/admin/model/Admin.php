<?php
namespace app\admin\model;
use think\Model;
use think\Db;
//管理员模型
class Admin extends Model{
    /**
     * 实现用户登录的模型方法
     * @param array 用户数据
     * @return boolean 正确为true 错误false
     */
    public function login($data){
        //查询用户名
        $result = Db::name('Admin')->where(['username'=>$data['username']])->find();
        //判断用户名是否存在
        if(!$result){
            //不存在返回false
            return false;
        }
        //验证密码是否正确
        if($result['password']!=md6($data['password'],$result['salt'])){
            //密码不正确返回false
            return false;
        }
        //组织返回信息
        $data = [
            'username'=>$result['username'],
            'token'=>getToken('admin','login','login',time(),$result['salt']),
            'avatar'=>$result['avatar'],
        ];
        //如果用户密码正确返回token
        return $data;
    }
}