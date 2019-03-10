<template>
  <div class="home">
    <el-container>
      <!-- 左侧容器 -->
      <el-aside class="aside" width="auto">
        <!-- logo -->
        <div class="logo"></div>
        <!-- 侧边栏 -->
        <el-menu
          default-active="0"
          class="el-menu-vertical-demo"
          :collapse="isCollapse">
          <el-menu-item index="0">
            <i class="el-icon-menu" @click="isCollapse = !isCollapse"></i>
            <span slot="title"><router-link to="/">首页</router-link></span>
          </el-menu-item>
          <el-submenu index="1">
            <template slot="title">
              <i class="el-icon-service"></i>
              <span slot="title">用户管理</span>
            </template>
            <el-menu-item index="1-1">子项1</el-menu-item>
            <!-- 三级菜单
                <el-submenu index="1-1">
              <span slot="title">折叠菜单1</span>
              <el-menu-item index="1-1-1">子项1</el-menu-item>
            </el-submenu> -->
          </el-submenu>
          <el-submenu index="2">
            <template slot="title">
              <i class="el-icon-document"></i>
              <span slot="title">文章管理</span>
            </template>
            <el-menu-item index="2-1">文章列表</el-menu-item>
          </el-submenu>
          <el-submenu index="3">
            <template slot="title">
              <i class="el-icon-message"></i>
              <span slot="title">消息管理</span>
            </template>
            <el-menu-item index="2-1"><router-link to="/Message">消息列表</router-link></el-menu-item>
          </el-submenu>
          <el-menu-item index="10">
            <i class="el-icon-setting"></i>
            <span slot="title">设置</span>
          </el-menu-item>
        </el-menu>
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
            <el-button type="primary" round @click="loginout()">退出</el-button>
          </div>
        </el-header>
        <!-- 头部结束 -->
        <!-- 网页主体 -->
        <el-main>
          <router-view></router-view>
        </el-main>
        <!-- 网页主体结束 -->
        <!-- 页尾 -->
        <el-footer>
          页尾
          </el-footer>
        <!-- 页尾结束 -->
      </el-container>
    </el-container>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: localStorage.getItem("username"),
      // 导航菜单是否展开
      isCollapse:false,
    };
  },
  methods: {
    //退出登录
    loginout() {
      localStorage.removeItem("username");
      localStorage.removeItem("token");
      this.$router.push("/login");
      //提示信息
      this.$message({
        message: "退出成功",
        type: "success"
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.home {
  height: 100%;
  // 导航菜单
  .el-menu-vertical-demo:not(.el-menu--collapse) {
    width: 200px;
    background-color: #bdc0c4;
  }
  // 导航菜单 子样式
  .el-submenu .el-menu-item {
    background-color: #dadada;
  }
  .el-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #bdc0c4;
  }
  .logo {
    height: 60px;
    background: url(../images/logo.png);
    background-size: 170px 56px;
    background-repeat: no-repeat;
    background-position-y: center;
    background-color: #bdc0c4;
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
  .welcome {
    color: white;
  }
}
</style>