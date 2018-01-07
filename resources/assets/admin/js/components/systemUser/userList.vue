<template>
    <div>
        <div class="m-b-20 ovf-hd">
            <div class="fl" v-show="addShow">
            <!--<div class="fl">-->
                <router-link class="btn-link-large add-btn" to="user-add">
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
                <template slot-scope="scope">
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
        <div class="pos-rel p-t-20">
            <!--<btnGroup :selectedData="multipleSelection" :type="'users'"></btnGroup>-->
            <div class="block pages">
                <el-pagination
                        @current-change="handleCurrentChange"
                        layout="prev, pager, next"
                        :page-size="limit"
                        :current-page="currentPage"
                        :total="dataCount">
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                tableData:[],
                keywords:"",
                limit:null,
                currentPage:null,
                dataCount:null,
            };
        },
        methods:{
            getData(){
                let param = {
                    page:this.currentPage,
                    keywords:this.keywords,
                };
                this.$http.get('/api/admin/system/user-list',{params:param}).then(response=>{
                    console.log(response);
                    if(parseInt(response.data.code) === 200){
                        let data = response.data.data;
                        this.tableData = data.data;
                        this.limit = data.per_page;
                        this.currentPage = parseInt(data.current_page);
                        this.dataCount = data.total;
                    }
                },response=>{
                    console.log(response);
                });
            },
            search(){
                this.$router.push({path:this.$router.currentRoute.path,query:{keywords:this.keywords,page:1}});
            },
            confirmDelete(id){
                console.log(id);
            },
            handleCurrentChange(page){

                this.$router.push({path:this.$router.currentRoute.path,query:{keywords:this.keywords,page:page}});
            },
            getKeyWords(){
                let data = this.$router.currentRoute.query;
                this.keywords = '';
                if (data) {
                    if (data.keywords) {
                        this.keywords = data.keywords;
                    }
                }
            },
            getCurrentPage(){
                let data = this.$router.currentRoute.query;
                this.currentPage = 1;
                if(data){
                    if(data.page){
                        this.currentPage = parseInt(data.page);
                    }
                }
            },
            init(){
                this.getKeyWords();
                this.getCurrentPage();
                this.getData();
            }
        },
        mounted:function (){
            this.$nextTick(function (){
                this.init();
            });
        },
        computed:{
            addShow(){
                return true;
            }
        },
        watch: {
            '$route' (to, from) {
                this.init()
            }
        },
    }

</script>