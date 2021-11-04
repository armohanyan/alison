<template>
    <div class="custom-model-main">
        <div class="custom-model-inner">
            <div class="close-btn">×</div>
            <div class="custom-model-wrap">
<!--------------------------LogIn Component here------------------------>
                            <login-component/>
<!----------------------------------------------------------------------->
<!--------------------------SignUp Component here------------------------>
                            <sign-up-component/>
<!----------------------------------------------------------------------->
            </div>
        </div>
        <div class="bg-overlay"></div>
    </div>
</template>


// Here is started JS

<script>
import LoginComponent from "./LoginComponent";
import SignUpComponent from "./SignUpComponent";

export default {
    name:'ModalComponent',
    components: {SignUpComponent, LoginComponent},

}
</script>

// Here is started CSS

<style>
.custom-model-main {
    display: none;
    text-align: center;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0; /* z-index: 1050; */
    -webkit-overflow-scrolling: touch;
    outline: 0;
    opacity: 0;
    z-index: -1000;
}

.model-open {
    opacity: 1;
    z-index: 99999;
    display: block;
    overflow: hidden;

}
.custom-model-inner {
    -webkit-transform: translate(0, -25%);
    -ms-transform: translate(0, -25%);
    transform: translate(0, -25%);
    -webkit-transition: -webkit-transform 0.3s ease-out;
    -o-transition: -o-transform 0.3s ease-out;
    transition: -webkit-transform 0.3s ease-out;
    -o-transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out;
    transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
    display: inline-block;
    vertical-align: middle;
    width: 800px;
    margin: 30px auto;
    max-width: 97%;
}
.custom-model-wrap {
    display: block;
    width: 100%;
    /*height: 100vh;*/
    position: relative;
    background-color: #15212a;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
    background-clip: padding-box;
    outline: 0;
    text-align: left;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    max-height: calc(100vh - 70px);

}
.model-open .custom-model-inner {
    -webkit-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    transform: translate(0, 0);
    position: relative;
    z-index: 999;
}
.model-open .bg-overlay {
    background: rgba(0, 0, 0, 0.6);
    z-index: 99;
}
.bg-overlay {
    background: rgba(0, 0, 0, 0);
    /*height: 100vh;*/
    width: 100%;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    z-index: 0;
    -webkit-transition: background 0.15s linear;
    -o-transition: background 0.15s linear;
    transition: background 0.15s linear;
}

.close-btn {
    position: absolute;
    right: 11px;
    top: -2px;
    cursor: pointer;
    z-index: 99;
    font-size: 30px;
    color: #fff;
}

@media screen and (min-width:800px){
    .custom-model-main:before {
        content: "";
        display: inline-block;
        height: auto;
        vertical-align: middle;
        margin-right: -0px;
        height: 100%;
    }
}
@media screen and (max-width:799px){
    .custom-model-inner{margin-top: 45px;}
}

/* Sign In */

.pop-up-content-wrap-signin{
    display: none;
}

.login-top{
    padding-top: 50px;
    padding-bottom: 20px;
    color: #fff;
    text-align: center;
}

.login-top .sign-in-title{
    font-size: 45px;
    color: #fff;
    font-weight: 700;
    line-height: 50px;
    margin-bottom: 10px;
    display: block;

}

.sign-in-text{
    color: #83c11f;
    margin-bottom: 15px;
    font-size: 18px
}

.tab{
    position: relative;
    display:flex;
    width: 100%;

}

.tab > div {
    width: 35%;
    text-align: center;
    cursor: pointer
}



.register-tab{
    box-shadow: 0 0 11px 0 rgb(50 50 50 / 94%);
    border-top-right-radius: 8px;
    background: #909193;
    text-align: center;
}

.register-tab a{
    padding: 15px 0;
    display: block;
    transition: background .3s ease-in;
    color: #fff;
}

.register-tab a:hover{
    color: #FFF;
}

.register-tab:hover{
    background-color: #ecf1f5;
}

.register-tab a:hover{
    color: #83c11f;
}

.login-tab{
    position: absolute;
    left: 274px;
    width: 35%;
    text-align: center;
    background: #909193;
    box-shadow: inset 0 -1px 1px 0 rgb(255 255 255 / 20%);
    cursor: pointer ;

}

.login-tab:hover{
    background-color: #ecf1f5;
}

.login-tab a {
    padding: 15px 0;
    display: block;
    color: #fff;
    transition: background .3s ease-in;
}

.login-tab a:hover {
    color: #83c11f;
}

.signup-inner{
    height: 100%;
    display: flex;
    padding-left: 30px;
    padding-top: 55px;

}
.login-bg{
    background-color: #ecf1f5;
    height: auto;
}

.login-withSocial{
    width: 50%;
    display: flex;
    flex-direction: column;
}

.login-bottom{
    overflow: hidden;
}

.social-login{
    position: relative;
}

.social-login a{
    display: block;
    color: #2d3942;
    width: 90%;
    background: #fff;
    margin: 0 auto 19px  ;
    padding: 8px 40px  ;
    font-size: 14px;
    text-align: left;
    transition: all .25s ease-in;
}

.social-login a:hover{
    background: #0094c9;
    color: #fff;
}

.social-login a:active{
    background: #0094c9;
    color: #fff;
}

.social-login img{
    background-color: #ecf1f5;
    top: 7px;
    position: absolute;
    left: 25px;
    width: 23px;
    aspect-ratio: auto 23 / 23;
    height: 23px;
}


.login-center-line {
    width: 2px;
    position: relative;
    text-align: center;
    opacity: .8;
    /*position: absolute;*/
    /*right: 0;*/
    top: -12px;
    height: 230px;
    background: #5d666d;
}

.login-center-line span{
    display: block;
    padding: 3px;
    position: absolute;
    color: #5d666d;
    font-size: 16px;
    background: #ecf1f5;
    border-radius: 100%;
    border: 1px
    solid #5d666d;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 32px;
}

.login-form{
    width: 100%;
    height: auto;
    padding: 0 38px 40px;
}

.parent-login-form p{
    color: #868d92;
    font-size: 13px;
    margin-bottom:0 !important;
}

.login-form > div{
    margin-top: 11px;
}

.parent-login-form > div {
    margin-top: 11px;
    height: 100%;
}

.flex-firstname-surname{
    display: flex;
    justify-content: space-between;
    width: 100%;
}

.parent-login-form > div  input{
    /*background: #fff;*/
    display: inline-block;
    font: 400 1em Roboto,helvetica neue,Helvetica,Arial,sans-serif;
    padding: 10px 20px;
    width: 100%;
    border: 0;
    border-bottom:1px solid #d3dade;
}

::placeholder {
    opacity: 1;
    color: #000000;
}

.parent-login-form > div  input:focus{
    outline: none;
}

.input-field-firstname {
    width: 48%;
}

.firstname{
    width: 100%;
}

.input-field-surname {
    width: 48%;
}

.surname{
    width: 100%;
}
.input-field-password{
    position: relative;
}

.input-field-password span{
    position: absolute;
    top: 7px;
    right:5px;
    font-size: 20px;
    font-weight: 700;
    width: 40px;
    height: 34px;
    color: #83c11f;
    cursor: pointer;
}

.label-remember,
.label-signup-tc{
    position: relative;
    display: block;
}

.label-remember,
.label-signup-tc span {
    padding-left: 20px;
}

.label-remember,
.label-signup-tc a{
    color: #5d666d;
    text-decoration: underline;
}

.label-remember,
.label-signup-tc a:hover{
    color: #5d666d;
}

#signup-tc,
#remember{
    position: absolute;
    left: -1000px;
}

.label-signup-tc::before{
    content: " ";
    position: absolute;
    top: 3px;

    width: 15px;
    height: 15px;
    border: 1px solid #aaa;
    display: block;
    vertical-align: text-top;
}

.label-remember::before{
    content: " ";
    position: absolute;
    top: 3px;
    left: 0;
    width: 15px;
    height: 15px;
    border: 1px solid #aaa;
    display: block;
    vertical-align: text-top;
}

[type=checkbox]:checked+label:after {
    background: #83c11f;
    position: absolute;
    content: " ";
    display: inline-block;
    height: 10px;
    left: 2px;
    top: 5px;
    width: 10px;
}

.btn-sign-in  {
    background-color: #83c11f;
    border-radius:3px;
    text-align: center;
    cursor: pointer;
}

.btn-sign-in  .btn-submit{
    padding: 10px;
    color: #fff;
    background-color: #83c11f;
    width: 100%;

}

.login-account {
    font-size: 14px;
    padding-top: 20px;
    color: #15212a !important;
}

.login-account a{
    color: #83c11f;
}

.login-account a:hover{
    color: #83c11f;
}

.tab > .active {
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    transform: scale(1.07);
    box-shadow: 0 0 11px 0 rgb(50 50 50 / 94%);
    background: #ecf1f5;
}

.tab >  .active a{
    color: #83c11f;
}

.margin-top{
    padding-top: 78px;
}

.forgot-password{
    color: #83c11f !important;
}

.label-remember > a {
    padding-left: 50px;
}
.password-visible-icon > .fa-eye-slash{
    display: none;
}

.is-invalid {
    font-size: 11px;
    font-weight: 100;
    color: red;
    /*border-bottom: solid red !important;*/
}

.is-invalid::placeholder{
    color: red;
}

.is-invalid i {
    padding-right: 3px;
}

.error-message-firstname,
.error-message-surname,
.error-message-email,
.error-message-error,
.error-message-password,
.error-message-login-email,
.error-message-login-password,
.error-message-login-invalid,
.error-message-signUpCondition{
    display: none;
}


.hide-item{
    display: none;
}

.active-item{
    display: block;
}

</style>
