//axios库
//导入axios
import axios from 'axios'

//设置公共接口网址
axios.defaults.baseURL = 'http://www.yeweb.com/index.php/'

/**
 * 登录接口
 * @param array 表单数据
 * @return json 返回后台数据
 */
export var login = function(data){
    return axios.post('admin/login/login',data).then((res)=>res.data)
}