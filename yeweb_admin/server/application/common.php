<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//密码加盐方法
if(!function_exists('md6')){
  function md6($password,$salt){
    return md5(md5($password).$salt);
   }
}
//随机token的方法
if(!function_exists('getToken')){
    //api_token = md5 ('模块名' + '控制器名' + '方法名' + '2017-07-18' + '加密密钥')
    function getToken($model,$controller,$fun,$date,$salt){
        return md5($model.$controller.$fun.$date.$salt);
    }
}