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
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
