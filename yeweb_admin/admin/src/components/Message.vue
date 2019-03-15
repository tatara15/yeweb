<template>
  <div class="message">
    <el-button-group>
      <el-button size="small" type="danger" icon="el-icon-delete" plain>删除</el-button>
      <el-button size="small" type="danger" icon="el-icon-warning" plain>举报</el-button>
    </el-button-group>
    <el-button-group>
      <el-button size="small" type="success" icon="el-icon-success" plain>已读</el-button>
      <el-button size="small" type="warning" icon="el-icon-error" plain>未读</el-button>
    </el-button-group>
    <el-button-group size="mini">
      <el-select v-model="value" placeholder="请选择">
        <el-option
          v-for="item in operation"
          :key="item.value"
          :label="item.label"
          :value="item.value">
          <span style="float: left">{{ item.label }}</span>
          <span style="float: right; color: #8492a6; font-size: 13px">{{ item.value }}</span>
        </el-option>
      </el-select>
    </el-button-group>
    <hr style="color:#bdc0c4;">
    <el-table
      ref="multipleTable"
      :data="messageList"
      tooltip-effect="dark"
      style="width: 100%"
      @selection-change="handleSelectionChange">
      <el-table-column
        type="selection"
        width="55">
      </el-table-column>
      <el-table-column
        prop="name"
        label="发件人"
        width="120">
      </el-table-column>
      <el-table-column
        prop="title"
        label="标题">
      </el-table-column>
      <el-table-column
        label="操作">
        <template slot-scope="">
          <el-row>
            <el-button size="mini" type="success" icon="el-icon-search">查看</el-button>
            <!-- <el-button size="mini" type="success" icon="el-icon-edit">回复</el-button> -->
            <el-button size="mini" type="danger" icon="el-icon-delete">删除</el-button>
          </el-row>
        </template>
      </el-table-column>
      <el-table-column
        prop="date"
        label="时间"
        width="120"
        show-overflow-tooltip>
      </el-table-column>
    </el-table>
  </div>
</template>

<script>
export default {
  data() { 
    return {
        // 消息操作
        operation: [
          {value: '1',label: '已读'},
          {value: '2',label: '未读'},
          {value: '3',label: '回收站'}
        ],
        // 消息列表
        messageList: [
          {
            date: '2016-05-03',
            name: '王小虎',
            title: '消息标题'
          }
        ],
        multipleSelection: []
    }
  },
  methods:{
    toggleSelection(rows) {
        if (rows) {
          rows.forEach(row => {
            this.$refs.multipleTable.toggleRowSelection(row);
          });
        } else {
          this.$refs.multipleTable.clearSelection();
        }
      },
      handleSelectionChange(val) {
        this.multipleSelection = val;
      }
  }
}
</script>

<style lang="scss" scoped>
.message {
  .left {
    float: left;
  }
  .right {
    float: right;
  }
}
</style>