<template>
    <div class="pop-up-content-wrap-signin">
        <div class="login-top">
            <h3 class="sign-in-title ">Sign Up For Free</h3>
            <p class="sign-in-text" >Join the World’s Largest Free Learning Community</p>
        </div>
        <div class="login-bottom">
            <div class="tab">
                <div class="login-tab active">
                    <a href="" class="modal-sign-up" >Sign Up </a>
                </div>
                <div class="register-tab">
                    <a href="" class="modal-sign-in">Log In</a>
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
                            <div class="flex-firstname-surname">
                                <div class="input-field-firstname">
                                    <input type="text" v-model="userData.firstname"  name="firstname" id="firstname" class="firstname" placeholder="First Name">
                                    <span v-if="errorMessage.firstname" class="is-invalid error-message-surname error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true">
                                    </i>{{ errorsArray.firstname }}</span>
                                </div>
                                <div class="input-field-surname">
                                    <input type="text" v-model="userData.surname"  name="surname" id="surname" class="surname"  placeholder="Surname">
                                    <span v-if="errorMessage.surname" class="is-invalid error-message-surname error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true">
                                         {{ errorsArray.surname }}</i></span>
                                </div>
                            </div>

                            <div class="input-field-email">
                                <input type="email" v-model="userData.email"  name="email" class="email" autocomplete="off" id="email" placeholder="E-mail">
                                <span v-if="errorMessage.email" class="is-invalid error-message-email error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true">{{ errorsArray.email }}</i></span>
                            </div>
                            <div class="input-field-password">
                                <input type="password" v-model="userData.password"  name="password" class="password" id="password"  placeholder="Password" >
                                <span class="password-visible-icon" >
                                    <i class="fa fa-eye signUp-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash signUp-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span v-if="errorMessage.password" class="is-invalid error-message-password error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ errorsArray.password }}</span>
                            <div class="login-form-bottom">
                                <span v-if="errorMessage.signUpCondition" class="is-invalid error-message-signUpCondition error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true">{{ errorsArray.signUpCondition }}</i></span>
                                <p>
                                    <input type="checkbox" v-model="userData.signUpCondition"   name="signUpCondition"  id="signup-tc">
                                    <label for="signup-tc" class="label-signup-tc" > <span> I agree to the </span>  <a href="" >Terms and Conditions </a></label>
                                </p>
                                <div class="btn-sign-in">
                                    <button  @click="signUpSubmit()" type="button" name="submit" class="btn-submit" id="signUpSubmit">Sign Up</button>
                                </div>
                                <p class="login-account">Already have an Alison account? <a href="" > Log In </a>  </p>
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
                firstname : '',
                surname : '',
                email : '',
                password : '',
                signUpCondition : '',
            },
            errorMessage: {
                firstname : false,
                surname : false,
                email : false,
                password : false,
                signUpCondition : false,
            },
            errorsArray : {},
        }
    },
    methods : {
        signUpSubmit() {
            $.each ((this.errorMessage), (key, value ) =>{
                this.errorMessage[key] = false
            })
            this.axios
                .post('/sign-up', this.userData)
                .then((response) => {
                    if ( response.data.success){
                        this.$emit( 'registeredUser', false);
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'You signed up successfully. Now You can sign in',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        location.reload();
                    }
                    else{
                        $.each(response.data.errors, (error, msg) => {
                            this.errorsArray[error] = msg.join() ;
                            this.errorMessage[error] =  true;
                        })
                    }
                })
                .catch(err => {
                    console.log('error')
                })
                .finally(() => this.loading = false)
        },
    },
}
</script>
