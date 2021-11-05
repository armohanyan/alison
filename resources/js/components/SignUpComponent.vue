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
                        <div class="login-form">
                            <div class="input-field-email">
                                <input v-model="userData.email" type="text" name="email" class="email" id="login-email" required  autocomplete="off" placeholder="Email adress">
                                <span v-if="hasError.email" class="is-invalid error-message-login-email error-login"><i class="fa fa-exclamation-circle" aria-hidden="true">{{ errorTexts.email }}</i></span>
                            </div>
                            <div class="input-field-password">
                                <input v-model="userData.password" type="password" name="password" class="password" id="login-password" required  placeholder="Password" >
                                <span class="password-visible-icon" >
                                    <i class="fa fa-eye signIn-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash signIn-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span v-if="hasError.password" class="is-invalid error-message-login-password error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ errorTexts.password }}</span>
                            <div class="login-form-bottom  margin-top">
                                <p>
                                    <input type="checkbox" checked name="remember" id="remember">
                                    <label for="remember" class="label-remember" > <span> Keep me logged in </span> <a href=""  class="forgot-password" >Forgot Password</a></label>
                                </p>
                                <div class="btn-sign-in">
                                    <button  @click="signInSubmit()" class="btn-submit" id="signInSubmit">Log in</button>
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
import SocialiteComponent from "./SocialiteComponent";

export default {
    components: { SocialiteComponent },
    data() {
        return {
            userData: {
                email : '',
                password : '',
            },
            hasError: {
                email : false,
                password : false,
            },
            errorTexts : {}
        }
    },
    methods : {

        signInSubmit() {
            var self = this;
            $.each ((self.hasError), (key, value ) =>{
                self.hasError[key] = false
            })
            this.axios
                .post('/sign-in', this.userData)
                .then(function (response){
                    if ( response.data.success ){
                        location.reload();
                    }
                    else{
                        $.each(response.data.errors, (error, msg) => {
                            self.errorTexts[error] = msg.join() ;
                            self.hasError[error] =  true;
                        })
                    }
                })
                .catch(err => {
                    console.log('error')
                })
                .finally(() => this.loading = false)
        }
    },
}
</script>
