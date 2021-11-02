<div class="header-inner">
    <div class="header-main">
        <div class="part-left p-2 flex-grow-1">
            <div class="logo">
                <a href=""><img class="logo-image" src="/images/alison.svg" alt=""></a>
            </div>
            <div class="search">
                <form>
                    <div class="custom-search">
                        <input type="text" class="custom-search-input" placeholder="Search for courses">
                        <button class="custom-search-botton" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="headerMenu">
                <ul class="nav-ul" >
                    <li  class="header-menu-list">
                        <a class="open-menu-category" data-open="categories-container" title="Course Categories">
                            <span>Course Categories <i style="font-weight: 100" class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    <li class="header-menu-list">
                        <a class="open-menu-course-type" data-open="categories-container" title="Course Categories">
                            <span>Course Types <i style="font-weight: 100" class="fa fa-angle-down" aria-hidden="true"></i></span>
                        </a>
                    </li>
                    <li class="header-menu-list">
                        <a class="" data-open="categories-container" href="" title="Course Categories">
                            <span>Career Guide </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

            <div class="dropdown  {{ Auth::check() ? 'active-item' : 'hide-item'}} " style="padding: 13px">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>

        @if( ! Auth::check() )
            <div class="login-links">
                <div class="login-links">
                    <a class="sign-up  modal-sign-up" href="">Sign Up</a>
                    <a class="sign-in modal-sign-in" href="">Log In</a>
                </div>
            </div>
        @endif
            <div class="logout-inner {{ Auth::check() ? 'active-item' : 'hide-item'}}" style="padding: 13px">
                <a href="{{ route('signout') }}" class="logout btn btn-primary">Logout</a>
            </div>
    </div>

{{--  Modal For Sign In   --}}

    <div class="custom-model-main">
        <div class="custom-model-inner">
            <div class="close-btn">×</div>
            <div class="custom-model-wrap">
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
                            <div class="login-withSocial">
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/facebook.svg" alt="">
                                    <a href="{{ url('/redirect/facebook') }}">Countinue with Facebook</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/google.svg" alt="">
                                    <a href="{{ route('redirect.google') }}">Countinue with Google</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/microsoft.svg" alt="">
                                    <a href="">Countinue with Microsoft</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/linkedin.svg" alt="">
                                    <a href="{{ route('redirect.linkedin') }}">Countinue with Linkedin</a>
                                </div>
                            </div>
                            <div class="login-center-line"><span>or</span></div>
                            <div class="login-form">
                                <p> This is the name that will appear on your Certification</p>
                                <div class="login-form-inner">
                                    <div id="login-form">
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
                                            <input type="email" name="email" class="email {{ $errors->has('email') ? 'is-invalid' : '' }}" autocomplete="off" id="email" placeholder="E-mail">
                                            <span class="is-invalid error-message-email error-signUp"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="input-field-password">
                                            <input type="password" name="password" class="password {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password"  placeholder="Password" >
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
                            <div class="login-withSocial">
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/facebook.svg" alt="">
                                    <a href="{{ route('redirect.facebook') }}">Countinue with Facebook</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/google.svg" alt="">
                                    <a href="{{ route('redirect.google') }}">Countinue with Google</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/microsoft.svg" alt="">
                                    <a href="">Countinue with Microsoft</a>
                                </div>
                                <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/linkedin.svg" alt="">
                                    <a href="{{ route('redirect.linkedin') }}">Countinue with Linkedin</a>
                                    </div>
                                    <div class="social-login">
                                    <img src="https://cdn01.alison-static.net/public/html/site/img/login/yahoo.svg" alt="">
                                    <a href="">Countinue with Yahoo</a>
                                </div>
                            </div>
                            <div class="login-center-line"><span>or</span></div>
                            <div class="login-form">
                                <div class="login-form-inner">
                                    <span class="is-invalid error-message-login-invalid error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                                    <div id="login-form">
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
                                             <span class="is-invalid error-message-login-password error-login"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>                                        <div class="login-form-bottom  margin-top">
                                            <p>
                                                <input type="checkbox" checked name="remember" id="remember">
                                                <label for="remember" class="label-remember" > <span> Keep me logged in </span> <a href=""  class="forgot-password" >Forgot Password</a></label>
                                            </p>
                                            <div class="btn-sign-in">
                                                <button class="btn-submit" id="signInSubmit">Log in</button>
                                            </div>
                                            <p class="login-account">Don't have an Alison account? <a href="" > Sign Up</a>  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay"></div>
    </div>
    <div class="category-list">
    <div class="color-change">
    <ul class="ul-category-list">
        <li>
            <a class="sm-link" href=""><i class="fa fa-desktop" aria-hidden="true"></i> <br>
                <span class="category-name">IT</span>
            </a>
        </li>
        <li >
            <a class="sm-link" href=""><i class="fa fa-medkit" aria-hidden="true"></i><br>
                <span class="category-name">Health</span>
            </a>
        </li>
        <li >
            <a class="sm-link" href=""><i class="fa fa-language" aria-hidden="true"></i><br>
                <span class="category-name">Language</span>
            </a>
        </li>
        <li >
            <a class="sm-link" href=""><i class="fa fa-briefcase" aria-hidden="true"></i><br>
                <span class="category-name">Bussines</span>
            </a>
        </li>
        <li >
            <a class="sm-link" href=""><i class="fa fa-bars" aria-hidden="true"></i> <br>
                <span class="category-name">All Category</span>
            </a>
        </li>
    </ul>
</div>
</div>

<div class="course-type">
    <div class="color-change">
        <ul class="ul-course-type">
            <li >
                <a class="sm-link" href=""><i class="fa fa-desktop" aria-hidden="true"></i> <br>
                    <span class="category-name">Certicate Courses</span>
                </a>
            </li>
            <li>
                <a class="sm-link" href=""><i class="fa fa-bookmark" aria-hidden="true"></i> <br>
                    <span class="category-name">Diploma Courses</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>



