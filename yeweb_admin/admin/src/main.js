// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
//导入vuex
import vuex from 'vuex'
//导入EU相关文件
import  'element-ui/lib/theme-chalk/index.css'
import element from 'element-ui/lib'

Vue.config.productionTip = false
//挂载
Vue.use(element)
Vue.use(vuex)

/**
 * 使用vuerouter配置全局前置守卫检车token
 * @param obj  to 即将要跳转的对象
 * @param obj from 当前正要离开的对象
 * @param func next() 跳转到一个不同的地址，不填则允许跳转
 */
router.beforeEach((to, from, next) => {
  //如果要跳转的是登录和注册则不阻止
  if(to.name.toLowerCase() == 'login' || to.name.toLowerCase() == 'register'){
    //不进行检查
    next()
  }else{
    //检查token是否存在
    if(localStorage.getItem('token')){
      next()
    }else{
      //不存在则返回login
      next('/login')
    }
  }
})


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
