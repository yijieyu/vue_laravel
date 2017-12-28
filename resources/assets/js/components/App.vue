<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                    <div style="color: red" @click="login('123456@qq.com','123456')">login
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            login : function (email,password) {
//                $.ajax({
//                    url:"/api/admin/login",
//                    type:"post",
//                    data:{},
//                    dataType:"json",
//                    success:function (res){
//                        console.log(res);
//                    }
//                });

                this.$http.post('/api/admin/login', {"email":"123456@qq.com", "password":"123456"}).then((response) => {
                    console.log(response);
                }, (response) => {
                    console.log(response);
                });
            }
        }
    }
</script>
