<template>
	<div>
		<el-button :loading="enableLoading" size="small" @click="changeAttrInBtnGroup(1)">启用</el-button>
		<el-button :loading="disableLoading" size="small" @click="changeAttrInBtnGroup(0)">禁用</el-button>
		<el-button :loading="deleteLoading" size="small" @click="deleteDatasInBtnGroup()">删除</el-button>
	</div>
</template>

<script>

  export default {
    props: ['selectedData', 'type'],
    data() {
      return {
        enableLoading: false,
        disableLoading: false,
        deleteLoading: false
      }
    },
    methods: {
      getUrl() {

      },
      getSelectedIds() {

      },
      changeAttrInBtnGroup(cate) {
      },
      deleteDatasInBtnGroup() {

      }
    },
    computed: {

    },
    mixins: []
  }
</script>