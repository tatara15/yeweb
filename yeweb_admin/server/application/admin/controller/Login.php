<?php
namespace app\admin\controller;
use think\Controller;
//登录用控制器
class Login extends Controller{
    //后台登录的方法
    public function login(){
        //接收获取到的数据
        $loginData = input();
        //判断用户名密码是否正确
        $result = model('admin')->login($loginData);
        if(!$result){
            //如果错误返回信息
            $data = [
                'msg'=>'用户名或密码错误',
                'status'=>1,
            ];
            return json_encode($data);
        }
        //如果正确则返回
        $data = [
            'msg'=>'登录成功',
            'status'=>0,
            'token'=>$result['token'],
            'username'=>$result['username'],
            'avatar'=>$result['avatar']
        ];
        // return json_encode('ok');
        return json_encode($data);
    }
}