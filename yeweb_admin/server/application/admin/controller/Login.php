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
        if(model('admin')->login($loginData)){
            return json_encode('ok');
        }
        // return json_encode('ok');
        // return json_encode(model('admin')->login($loginData));
    }
}