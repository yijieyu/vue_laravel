<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                    <div style="color: red" @click="login">login
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
            login : function () {
                $http.post('/api/admin/login', {email, password}).then((response) => {
                    dispatch(LOGIN, response.data.name, response.data.token);
                    _this.$route.router.go({ name: 'profile' });
                }, (response) => {
                    dispatch(VALIDATE_ERROR, [response.data.error]);
                });
            }
        }
    }
</script>
