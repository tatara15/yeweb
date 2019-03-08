<template>
    <div class="home">
        <el-container>
        <!-- 左侧容器 -->
        <el-aside class="aside" width="200px">
            <!-- logo -->
            <div class="logo"></div>
            <!-- 侧边栏 -->
            <el-col>
                <el-menu
                default-active="2"
                class="el-menu-vertical-demo"
                background-color="#545c64"
                text-color="#fff"
                active-text-color="#ffd04b">
                <el-menu-item index="4">
                    <i class="el-icon-menu"></i>
                    <span slot="title">首页</span>
                </el-menu-item>
                <el-submenu index="1">
                    <template slot="title">
                    <i class="el-icon-tickets"></i>
                    <span>文章管理</span>
                    </template>
                    <el-menu-item-group>
                    <el-menu-item index="1-1">选项1</el-menu-item>
                    <el-menu-item index="1-2">选项2</el-menu-item>
                    </el-menu-item-group>
                    </el-submenu>
                </el-menu>
            </el-col>
        <!-- 侧边栏结束 -->
        </el-aside>
        <!-- 左侧容器结束 -->
        <el-container>
            <!-- 头部 -->
            <el-header>
                <!-- 留白 -->
                <div></div>
                <!-- 标题 -->
                <div class="system-title">yeweb后台管理系统</div>
                <!-- 欢迎信息 -->
                <div class="welcome">
                    欢迎{{username}},&nbsp;&nbsp;
                    <el-button type="primary" round @click="loginout()" >退出</el-button>
                </div>
            </el-header>
            <!-- 头部结束 -->
            <!-- 网页主体 -->
            <el-main>
                主体
                <router-view></router-view>
            </el-main>
            <!-- 网页主体结束 -->
            <!-- 页尾 -->
            <el-footer>页尾</el-footer>
            <!-- 页尾结束 -->
        </el-container>
        </el-container>
    </div>
</template>

<script>
export default {
    data() { 
        return {
          username:localStorage.getItem('username')
        }
    },
    methods:{
      //退出登录
      loginout(){
        localStorage.removeItem('username')
        localStorage.removeItem('token')
        this.$router.push('/login')
        //提示信息
        this.$message({
            message:'退出成功',
            type: 'success'
        });
      }
    }
}
</script>

<style lang="scss" scoped>
.home {
  height: 100%;
  .el-menu-admin:not(.el-menu--collapse) {
    width: 200px;
    min-height: 400px;
  }
  .el-container {
    height: 100%;
  }
  .el-aside {
    background-color: #545c64
  }
  .el-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #545c64;
  }
  .logo {
    height:60px;
    background: url(../images/logo.png);
    background-size: cover;
    background-color: #545c64;
  }
  .toggle-btn {
    font-size: 36px;
    color: #989898;
    cursor: pointer;
    line-height: 60px;
  }
  .system-title {
    font-size: 28px;
    color: white;
  }
  .welcome, {
    color: white;
  }
}
</style>