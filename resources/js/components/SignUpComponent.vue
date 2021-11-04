<template>
    <div class="pop-up-content-wrap-login">
        <div class="login-top">
            <h3 class="sign-in-title ">Welcome Back!</h3>
            <p class="sign-in-text" >What will you learn today? Find out, with Alison.</p>
        </div>
        <div class="login-bottom">
            <div class="tab">
                <div class="login-tab">
                    <a href="" class="modal-sign-up">Sign Up </a>
                </div>
                <div class="register-tab active">
                    <a href=""  class="modal-sign-in">Log In</a>
                </div>
            </div>
        </div>
        <div class="login-bg">
            <div class="signup-inner">
<!--------------------------Socialite Component here------------------------>
                            <socialite-component/>
<!--------------------------------------------------------------------------->
                <div class="login-center-line"><span>or</span></div>
                <div class="parent-login-form">
                    <div class="login-form-inner">
                        <span class="is-invalid error-message-login-invalid error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                        <div class="login-form">
                            <div class="input-field-email">
                                <input type="text" name="email" class="email" id="login-email" required  autocomplete="off" placeholder="Email adress">
                                <span class="is-invalid error-message-login-email error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                            </div>
                            <div class="input-field-password">
                                <input type="password" name="password" class="password" id="login-password" required  placeholder="Password" >
                                <span class="password-visible-icon" >
                                    <i class="fa fa-eye signIn-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash signIn-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span class="is-invalid error-message-login-password error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                            <div class="login-form-bottom  margin-top">
                                <p>
                                    <input type="checkbox" checked name="remember" id="remember">
                                    <label for="remember" class="label-remember" > <span> Keep me logged in </span> <a href=""  class="forgot-password" >Forgot Password</a></label>
                                </p>
                                <div class="btn-sign-in">
                                    <button  @click="logInSubmit" class="btn-submit" id="signInSubmit">Log in</button>
                                </div>
                                <p class="login-account">Don't have an Alison account? <a href="" > Sign Up</a>  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
        name:'SignUpComponent',
        methods : {
           logInSubmit:function(){
                console.log(1)
            }
    }
}
</script>
