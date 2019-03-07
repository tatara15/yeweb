<template>
    <div class="register">
        <div class="container">
            <el-form ref="registerForm" :rules="rules" :model="register" label-width="85px">
                <div class="avatar">
                </div>
                <el-form-item label="账号" prop='username'>
                    <el-input v-model="register.username" placeholder="请输入用户名" ></el-input>
                </el-form-item>
                <el-form-item label="密码" prop='password'>
                    <el-input type='password' v-model="register.password"  placeholder="请输入密码"  autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="确认密码" prop='confirmPwd'>
                    <el-input type='password' v-model="register.confirmPwd" placeholder="确认密码" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" class="register-btn" @click='submitFrom("registerForm")'>注册</el-button>
                </el-form-item>
                <el-form-item>
                    <el-button type="info" plain class="register-btn" @click='login'>马上登录</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script>
import {register} from '@/api'
export default {
    data() { 
        var validatePass = (rule, value, callback) => {
            if (value === '') {
                callback(new Error('请输入确认密码'));
            } else if (this.register.password !== this.register.confirmPwd) {
                callback(new Error('两次输入密码不一致!'));
            } else {
                callback();
            }
        };
        return {
            register:{
                username:localStorage.getItem('username'),
                password:"",
                confirmPwd:""
            },
            rules: {
                username: [ 
                    { required: true, message: '请输入用户名', trigger: 'blur' },
                    { min: 3, max: 11, message: '长度在 3 到 11 个字符', trigger: 'blur' }
                ],
                password: [
                    { required: true, message: '请输入密码', trigger: 'blur' },
                    { min: 6, max: 18, message: '长度在 6 到 18 个字符', trigger: 'blur' }
                ],
                confirmPwd: [
                    { validator: validatePass, trigger: 'blur' }
                ],
               
            }
        }
    },
    watch:{
        "register.username":function(){
            localStorage.setItem('username',this.register.username)
        }
    },
    methods:{
        login(){
            this.$router.push('/login')
        },
        submitFrom(fromName){
            //通过vue对象获取elementuiDOM对象，触发事件
            this.$refs[fromName].validate((valid) => {
                //如果表单提交存在
                if(valid){
                    register(this.register).then((res)=>{
                        //如果注册成功
                        if(!res['status']){
                            //提示信息
                            this.$message({
                                message: res['msg'],
                                type: 'success'
                            });
                            //跳转到login
                            this.$router.push('/login')
                        }else{
                            //提示错误信息
                            this.$message.error(res['msg'])
                        }
                    })
                }
            })
        }
    }
}
</script>

<style lang="scss" scoped>
.register {
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
    .register-btn {
      width: 100%;
    }
  }
}
</style>