<?php
namespace app\admin\model;
use think\Model;
use think\Db;
//管理员模型
class Admin extends Model{
    /**
     * 实现用户登录的模型方法
     * @param array 用户数据
     * @return array|boolean 前端所需相关数据|错误则返回false
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

    /**
     * 注册的方法
     * @param araay 表单数据
     * @return araay|int 前端所需相关数据|错误则返回1:用户名已存在，2：存入数据错误
     */
    public function register($data){
        //查询用户名是否存在
        $result = Db::name('Admin')->where(['username'=>$data['username']])->find();
        //如果用户名存在则返回false
        if($result){
            return 1;
        }
        //如果用户名不存在则进行注册
        //组装盐
        $salt = rand(1000,9999);
        //组装用户信息
        $admin = [
            'username'=>$data['username'],
            'password'=>md6($data['password'],$salt),
            'salt'=>$salt
        ];
        //把数据存入数据库
        $res = Db::name('Admin')->insert($admin);
        if(!$res){
            return 2;
        }
        //如果成功则返回0
        return 0;
    }
} 