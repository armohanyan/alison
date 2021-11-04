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
                                    <input type="text"  name="firstname" id="firstname" class="firstname" placeholder="First Name">
                                    <span class="is-invalid error-message-surname error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>                                            </div>
                                <div class="input-field-surname">
                                    <input type="text" name="surname" id="surname" class="surname"  placeholder="Surname">
                                    <span class="is-invalid error-message-surname error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <div class="input-field-email">
                                <input type="email" name="email" class="email" autocomplete="off" id="email" placeholder="E-mail">
                                <span class="is-invalid error-message-email error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                            </div>
                            <div class="input-field-password">
                                <input type="password" name="password" class="password" id="password"  placeholder="Password" >
                                <span class="password-visible-icon" >
                                    <i class="fa fa-eye signUp-eye" aria-hidden="true"></i>
                                    <i class="fa fa-eye-slash signUp-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                            <span class="is-invalid error-message-password error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>

                            <div class="login-form-bottom">
                                <span class="is-invalid error-message-signUpCondition error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                <p>
                                    <input type="checkbox"  name="signUpCondition"  id="signup-tc">
                                    <label for="signup-tc" class="label-signup-tc" > <span> I agree to the </span>  <a href="" >Terms and Conditions </a></label>
                                </p>
                                <div class="btn-sign-in">
                                    <button type="button" name="submit" class="btn-submit" id="signUpSubmit">Sign Up</button>
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
export default {
    name:'LoginComponent'
}
</script>
