<template>
    <div class="m-l-50 m-t-30 w-500">
        <el-form ref="form" :model="form" :rules="rules" label-width="130px">
            <el-form-item label="用户名" prop="username">
                <el-input v-model.trim="form.username" class="h-40 w-200" :maxlength=12 :disabled="true"></el-input>
            </el-form-item>
            <el-form-item label="密码" prop="password">
                <el-input v-model.trim="form.password" class="h-40 w-200"></el-input>
            </el-form-item>
            <el-form-item label="邮箱" prop="mail">
                <el-input v-model.trim="form.mail" class="h-40 w-200"></el-input>
            </el-form-item>
            <el-form-item label="电话" prop="phone">
                <el-input v-model.trim="form.phone" class="h-40 w-200"></el-input>
            </el-form-item>
            <el-form-item label="描述" prop="desc">
                <el-input v-model.trim="form.desc" class="h-40 w-200"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="add()" :loading="isLoading">提交</el-button>
                <el-button @click="goback()">返回</el-button>
            </el-form-item>
        </el-form>
    </div>
</template>
<style>
    .form-checkbox:first-child{
        margin-left: 15px;
    }
</style>

<script>
    export default {
        data(){
            return {
                isLoading: false,
                id: null,
                form: {
                    id:'',
                    username: '',
                    password: '',
                    mail: null,
                    phone: '',
                    desc: ''
                },
                password: '',
                rules: {
                    username: [
                        { required: true, message: '请输入用户名' }
                    ],
                    password: [
                        { required: true, message: '请输入密码' }
                    ],
                    mail: [
                        { required: true, message: '请输入邮箱' }
                    ],
                    phone: [
                        { required: true, message: '请输入电话' }
                    ],
                    desc: [
                        { required: true, message: '请输入描述' }
                    ]
                }
            };
        },
        methods:{
            add(){
                this.$refs['form'].validate((valid) => {
                    if (valid) {
                        this.saveUser();
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            getUser(ID){
                this.$http.get('/api/admin/system/get-user?id=' + ID).then(response=>{
                    if(response.data.code === 200){
                        let data = response.data.data;
                        this.form = {
                            username : data.username,
                            password : data.password,
                            mail : data.mail,
                            phone : data.phone,
                            desc:data.desc,
                            id:data.id
                        }
                    }
                },response=>{
                    console.log(response);
                });
            },
            saveUser(){
                this.$http.post('/api/admin/system/save-user',this.form).then(response=>{
                    if(parseInt(response.data.code) === 200){
                        _g.toastMsg('success', '添加成功');
                        setTimeout(() => {
                            this.$router.push({name:'userList'});
                        }, 1500);
                    }else{
                        _g.toastMsg('error', '添加失败');
                    }
                },response=>{
                    console.log(response);
                });
            }
        },
        mounted:function(){
            this.$nextTick(function (){
                let ID = this.$route.params.id;
                this.getUser(ID);
            });
        }

    }
</script>