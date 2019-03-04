<template>
    <div class="home">
        <el-container>
         <!-- 侧边栏    -->
        <el-aside width="auto">
            <div class="logo">
                logo
            </div>
            chelan
        </el-aside>
        <el-container>
            <!-- 头部 -->
            <el-header>
                toubu
            </el-header>
            <!-- 主体 -->
            <el-main>
                <router-view></router-view>
            </el-main>
        </el-container>
        </el-container>
    </div>
</template>

<script>
export default {
    data() { 
        return {
        }
    },
    methods:{
       
    }
}
</script>

<style lang="scss" scoped>
.home {
    height: 100%;
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 200px;
        min-height: 400px;
    }
    .el-container {
        height: 100%;
    }
    .el-aside {
        background-color: #c4e0f6;
    }
    .el-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #c4e0f9;
    }
    .logo {
        height:60px;
        // background: url(../images/logo.jpg);
        background-size: cover;
        background-color: #989898;
    }
    .toggle-btn {
        font-size: 36px;
        color: #989898;
        cursor: pointer;
        line-height: 60px;
    }
    .system-title {
        font-size: 28px;
        color: #1e1e1e;
    }
    .welcome, {
        color: #1e1e1e;
    }
}
</style>