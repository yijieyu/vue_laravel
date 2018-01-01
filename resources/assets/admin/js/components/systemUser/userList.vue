<template>
    <div>
        <div class="m-b-20 ovf-hd">
            <div class="fl" v-show="addShow">
            <!--<div class="fl">-->
                <router-link class="btn-link-large add-btn" to="add">
                    <i class="el-icon-plus"></i>&nbsp;&nbsp;添加用户
                </router-link>
            </div>
            <div class="fl w-200 m-l-30">
                <el-input placeholder="请输入用户名" v-model="keywords">
                    <el-button slot="append" icon="search" @click="search()"></el-button>
                </el-input>
            </div>
        </div>
        <el-table :data="tableData" stripe style="width: 100%">
            <el-table-column prop="id" label="id" width="180"></el-table-column>
            <el-table-column prop="username" label="姓名" width="180"></el-table-column>
            <el-table-column prop="mail" label="邮箱"></el-table-column>
            <el-table-column prop="desc" label="描述"></el-table-column>
            <el-table-column prop="phone" label="电话"></el-table-column>
            <el-table-column prop="status" label="状态"></el-table-column>
            <el-table-column label="操作">
                <template scope="scope">
                    <div>
                        <span>
                            <router-link :to="{ name: 'userEdit', params: { id: scope.row.id }}" class="btn-link edit-btn">编辑</router-link>
                        </span>
                        <span>
                            <el-button size="small" type="danger" @click="confirmDelete(scope.row)">删除</el-button>
                        </span>
                    </div>
                </template>
            </el-table-column>
        </el-table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tableData:[],
                keywords:""
            };
        },
        methods:{
            getData(){
                this.$http.get('/api/admin/system/user-list').then(response=>{
                    console.log(response);
                    if(parseInt(response.data.code) === 200){
                        this.tableData = response.data.data.data;
                    }
                },response=>{
                    console.log(response);
                });
            },
            search(){

            },
            confirmDelete(id){
                console.log(id);
            }
        },
        mounted:function (){
            this.$nextTick(function (){
                this.getData();
            });
        },
        computed:{
            addShow(){
                return true;
            }
        }
    }

</script>