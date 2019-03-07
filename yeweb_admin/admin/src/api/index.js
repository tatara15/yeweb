//axios库
//导入axios
import axios from 'axios'

//设置公共接口网址
axios.defaults.baseURL = 'http://www.yeweb.com/index.php/'


//axios请求拦截器
axios.interceptors.request.use(function (config) {
    //修改请求头的配置项
    config.headers = {'Authorization':localStorage.getItem('token')}
    return config;
}, function (error) {
    // 对请求错误做些什么
    return Promise.reject(error);
});

//axios响应拦截器
axios.interceptors.response.use(function (response) {
    //判断token是否正确
    if(response.data.status == 1){
        location.href = '#/login'
    }
    return response;
}, function (error) {
    // 对响应错误做点什么
    return Promise.reject(error);
});

/**
 * 登录接口
 * @param array 表单数据
 * @return json 返回后台数据
 */
export var login = function(data){
    return axios.post('admin/login/login',data).then((res)=>res.data)
}

/**
 * 注册接口
 * @param array 表单数据
 * @return json 返回后台数据
 */
export var register = function(data){
    return axios.post('admin/login/register',data).then((res)=>res.data)
}