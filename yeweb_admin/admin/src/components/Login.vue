<template>
    <div class="login">
        <div class="container">
            <!-- 头像 -->
            <div class="avatar">
                <!-- 默认头像为1.jpg -->
                <img src="../images/1.jpg" width="100%" alt="">
            </div>
            <el-form ref="loginForm" :model="login" label-width="55px">
                <el-form-item label="账号">
                    <el-input v-model="login.username" placeholder="请输入用户名"></el-input>
                </el-form-item>
                <el-form-item label="密码">
                    <el-input v-model="login.password" placeholder="请输入密码" @keydown.native.enter="loginFrom('loginForm')"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" class="login-btn" @click="loginFrom('loginForm')">登录</el-button>
                </el-form-item>
                <el-form-item>
                    <el-button type="info" plain class="login-btn" @click="register()">马上注册</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
import {login} from '@/api'
export default {
    data() { 
        return {
            login:{            
                username:localStorage.getItem('username'), 
                password:''
            }
        }
    },
    watch:{
        'login.username':function(){
            localStorage.setItem('username',this.login.username)
        }
    }
    ,
    methods:{
        /**
         * 接收表单提交的方法
         * @param str 表单名称
         */
        loginFrom(fromName){
            //通过vue对象获取elementuiDOM对象，触发事件
            this.$refs[fromName].validate((valid) => {
                //判断表单数据是否存在
                if(valid){
                    //向后台请求
                    login(this.login).then((res)=>{
                        //成功返回值为0，如果取反成功则表示验证成功
                        if(!res['status']){
                            //保存后台返回来的token,用户名，头像
                            localStorage.setItem('token',res['token'])
                            localStorage.setItem('username',res['username'])
                            localStorage.setItem('avatar',res['avatar'])
                            //登录成功跳转到后台首页
                            this.$router.push('/')
                            //提示信息
                            this.$message({
                                message: res['msg'],
                                type: 'success'
                            });
                        }else{
                        //提示信息
                        this.$message.error(res['msg'])
                        }
                    })
                }
            })
        },
        register(){
            this.$router.push('/register')
        }
    }
}
</script>

<style lang="scss" scoped>
body{
    margin: 0;
    padding: 0px;
}
.login {
  position: fixed;
  width: 100%;
  height: 100%;
  background-color: #2f4050;

  .container {
    position: absolute;
    left: 0;
    right: 0;
    width: 400px;
    padding: 0px 40px 15px 40px;
    margin: 200px auto;
    background: white;
    .avatar {
      position: relative;
      left: 50%;
      width: 120px;
      height: 120px;
      margin-left: -60px;
      margin-top: -60px;
      box-sizing: border-box;
      border-radius: 50%;
      border: 10px solid #fff;
      box-shadow: 0 1px 5px #ccc;
      overflow: hidden;
    }
    .login-btn {
      width: 100%;
    }
  }
}
</style>