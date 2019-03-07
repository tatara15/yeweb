<?php
namespace app\admin\controller;
use think\Controller;
//后台公共控制器
class common extends Controller{
    //自动加载
    function __construct(){
        //实现父类方法
        parent::__construct();
        //验证请求头
        $token = $_SERVER['HTTP_USER_AGENT'];
        dump($token);exit;
    }
}