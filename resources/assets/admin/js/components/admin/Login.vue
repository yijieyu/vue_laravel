<template>
    <div class="container" id="app">
        <div class="login" id="login">
            <div class="logo" id="logo">
                <svg version="1.1" id="图层_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="-250 374 93.9 93.9" style="enable-background:new -250 374 93.9 93.9;" xml:space="preserve">
          <circle id="XMLID_61_" class="st0" cx="-203" cy="421" r="47"/>
          <linearGradient id="XMLID_3_" gradientUnits="userSpaceOnUse" x1="-203" y1="463.88" x2="-203" y2="377.8437" gradientTransform="matrix(1 0 0 -1 0 841.8701)">
            <stop  offset="0" style="stop-color:#FFA60A"/>
            <stop  offset="0.2867" style="stop-color:#FFAA0A"/>
            <stop  offset="0.5559" style="stop-color:#FFB50A"/>
            <stop  offset="0.8172" style="stop-color:#FFC80A"/>
            <stop  offset="1" style="stop-color:#FFDA0A"/>
          </linearGradient>
          <circle id="XMLID_60_" class="st1" cx="-203" cy="421" r="43.3"/>
          <path id="XMLID_1_" class="st2" d="M-197.9,415.4"/>
          <g id="XMLID_6_">
              <g>
                  <defs>
                      <polygon id="SVGID_1_" points="-200.4,438.8 -206.5,444.9 -165.8,444.8 -165.8,406.9 -196.9,406.9 -214.4,421.7 -220.6,427.9
                           -207.4,427.9 -200,422 -183.8,422 -191.8,430.1           "/>
                  </defs>
                  <clipPath id="SVGID_2_">
                      <use xlink:href="#SVGID_1_"  style="overflow:visible;"/>
                  </clipPath>
                  <path id="XMLID_4_" class="st3" d="M-220.9,425.1h11.9l9.8-9.8c0,0,4.8-5.2,12.7-5.2c8.6,0,15.8,7.5,15.8,16c0,8.7-7.9,16-15.6,16
                      c-7.8,0-17.7,0-20,0"/>
              </g>
          </g>
          <g id="XMLID_7_">
              <g>
                  <defs>
                      <polygon id="SVGID_3_" points="-182.8,421.1 -191.1,429.4 -210.1,445.5 -237.9,445.5 -237.9,393.8 -181.9,393.8 -183,404.2
                           -192.5,404.2 -228.1,428.9 -205.9,428.7 -195.4,419.3             "/>
                  </defs>
                  <clipPath id="SVGID_4_">
                      <use xlink:href="#SVGID_3_"  style="overflow:visible;"/>
                  </clipPath>
                  <path id="XMLID_5_" class="st4" d="M-183.9,425.3h-12l-16.9,16.9c0,0-4.3,0-6.8,0c-7,0-15.6-5.7-15.6-16.9
                      c0-9.3,7.9-13.8,12.7-14.9c1.9-6.5,9.6-13.9,19.1-13.9c12.9,0,17.5,9.4,17.5,9.4"/>
              </g>
          </g>
        </svg>
            </div>
            <div class="login_info">
                <input type="text" placeholder="用户名" class="login_input" v-model="userName" @keyup.enter="login">
                <input type="password" placeholder="密码" class="login_input" v-model="password" @keyup.enter="login">
                <div class="tips">
                    <span class="error_tips" v-show='isShow' v-text='errorMsg'></span>
                    <span class="custom_ck">
            <label for="remb_pw" class="cus_ck_l">
                <input type="checkbox" id="remb_pw" name="" value="" />
                <span></span>
                记住密码
            </label>
          </span>
                </div>
                <a id="login_btn" href="javascript:;" class="login_btn" @click="login">登录</a>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        data(){
            return {
                isLoging: false,
                userName: '',
                password: '',
                isShow: false,
                errorMsg: ''
            };
        },
        methods:{
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        alert('submit!');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            login (){
                if (this.userName != '' && this.password != '') {
                    this.toLogin();
                } else {
                    this.isShow = true;
                    this.errorMsg = '用户名密码不能为空，请重试。';
                }
            },
            //登录请求
            toLogin () {
                let instance = this;
                //需要向后端发送的登录参数
                let loginParam = {
                    username: this.userName,
                    password: this.password //未加密
                };
                //设置在登录状态
                this.isLoging = true;

                //请求后端:
                instance.$http.post('/api/admin/login', loginParam).then(response=>{

                    if (response.body.code == 200) {
                        window.location.href = "http://localhost:8110/admin/login#/admin/index ";
                    }else{
                        this.isShow = true;
                        this.errorMsg = "用户名或密码错误，请重试。";
                    }
                }, response => {
                    this.isShow = true;
                    this.errorMsg = '用户名或密码错误，请重试。';
                });
            },

        }
    }

</script>

<style>
    body,ul,ol,p,h1,h2,h3,h4,h5,dl,dd,form,input,textarea,td,th,button,strong,em,select,video,canvas{margin:0;padding:0;}
    li{list-style:none;vertical-align:top;}
    table{ border-collapse:collapse;}
    textarea{resize:none;overflow:auto;}
    img{ border:none; vertical-align:middle;}
    em{ font-style:normal;}
    a{ text-decoration:none;}
    a,input{ -webkit-tap-highlight-color:rgba(0,0,0,0);/*ios android去除自带阴影的样式*/}
    input{outline:0px;}
    body{background:#f1f1f1; margin: 0; padding: 0; font-family:'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;}
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
    .login{
        padding: 0 40px;
        position: fixed;
        left: 50%;
        top: 50%;
        width: 440px;
        min-height: 420px;
        transform: translate(-50%,-50%);
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        -ms-border-radius: 12px;
        -o-border-radius: 12px;
        border-radius: 12px;
        background: linear-gradient(180deg, #FFFFFF 0%, #FFFAF3 100%);
        box-shadow: 0px 20px 40px rgba(255, 166, 10, 0.15);
        -webkit-box-shadow: 0px 20px 40px rgba(255, 166, 10, 0.15);
        box-sizing: border-box;
        overflow: hidden;
        z-index: 10;
    }
    input::-webkit-input-placeholder{
        line-height: normal;
        font-size: 16px;
        color: #FFE491;
    }
    input::-moz-placeholder{
        line-height: normal;
        font-size: 16px;
        color: #FFE491;
    }
    input::-ms-input-placeholder{
        line-height: normal;
        font-size: 16px;
        color: #FFE491;
    }
    .logo{
        margin: 32px auto;
        width: 120px;
        height: 120px;
    }
    .login_input{
        margin-bottom: 22px;
        padding: 7px 10px;
        width: 360px;
        height: 40px;
        border: 2px solid #FFF0C1;
        background-color: #FFFFFF;
        box-sizing: border-box;
        border-radius: 8px;
    }
    .login_input:focus{
        border: 2px solid #FFC20A;
    }
    .tips{
        position: relative;
        margin-top: -13px;
        height: 27px;
        font-size: 12px;
        line-height: 27px;

    }
    .error_tips{
        display: inline-block;
        color: #FF4D00;
    }
    .custom_ck{
        display: block;
        position: absolute;
        right: 0;
        bottom: 0;
        color: #FFC000;
    }
    .cus_ck_l{
        display:inline-block;
        cursor:pointer;
    }
    .cus_ck_l input[type="checkbox"]{
        appearance: none;
        -webkit-appearance: none;
        outline: none;
        display:none
    }
    .cus_ck_l input[type="checkbox"] + span{
        position: relative;
        width:14px;
        height:14px;
        margin-right: 5px;
        display:inline-block;
        border: 2px solid #FFF0C1;
        border-radius: 100%;
        vertical-align: middle;
    }
    .cus_ck_l input[type="checkbox"]:checked + span:after{
        content: '\00a0';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #FFC000;
        position: absolute;
        left: 3px;
        top: 3px;
    }
    .login_btn{
        margin: 9px auto 0;
        display: block;
        width: 220px;
        height: 44px;
        background: -webkit-linear-gradient(#FFDA0A 0%, #FFC20A 100%);
        background: -o-linear-gradient(#FFDA0A 0%, #FFC20A 100%);
        background: linear-gradient(#FFDA0A 0%, #FFC20A 100%);
        box-shadow: 0px 4px 10px rgba(255, 166, 10, 0.25);
        border-radius: 22px;
        font-size: 20px;
        line-height: 44px;
        text-align: center;
        color: #FFFFFF;
    }
    .login_btn:hover{
        background: #FFC20A;
    }
    .login_btn:active{
        box-shadow: inset 0px 4px 10px #FFA60A;
    }
    /* logo style start */
    .st0{opacity:0.3;fill:#FFDA0A;enable-background:new    ;}
    .st1{fill:url(#XMLID_3_);}
    .st2{fill:#D6D6D6;}
    .st3{clip-path:url(#SVGID_2_);fill:none;stroke:#FFFFFF;stroke-width:5.2;stroke-miterlimit:10;  stroke-dasharray: 110;
        stroke-dashoffset: 110;
        -webkit-animation: linee 4s cubic-bezier(.41,.21,.44,.96) ;animation-fill-mode: forwards;
        animation: linee 4s cubic-bezier(.41,.21,.44,.96) ;animation-fill-mode: forwards;
    }
    @-webkit-keyframes linee {  to {stroke-dashoffset: 0;}}
    @keyframes linee {  to {stroke-dashoffset: 0;}}

    .st4{clip-path:url(#SVGID_4_);fill:none;stroke:#FFFFFF;stroke-width:5.2;stroke-miterlimit:10; stroke-dasharray: 136;
        stroke-dashoffset: 136;
        -webkit-animation: lineee 4s cubic-bezier(.41,.21,.44,.96) ;animation-fill-mode: forwards;
        animation: lineee 4s cubic-bezier(.41,.21,.44,.96) ;animation-fill-mode: forwards;
    }
    @-webkit-keyframes lineee {  to {stroke-dashoffset: 0;}}
    @keyframes lineee {  to {stroke-dashoffset: 0;}}
    /* logo style start */

</style>