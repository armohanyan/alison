<template>

    <div class="header-inner">
        <div class="header-main">
            <div class="part-left p-2 flex-grow-1">
                <div class="logo">
                    <a href="/"><img class="logo-image" src="/images/alison.svg" alt=""></a>
                </div>
                <div class="search">
                    <form>
                        <div class="custom-search">
                            <input type="text" class="custom-search-input" placeholder="Search for courses">
                            <button class="custom-search-botton" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>+
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

            <div :class="isAuth ? 'active-item dropdown': 'hide-item' " style="padding: 13px">
                <img src="https://img.icons8.com/fluency/48/000000/person-male.png"/>
                <span>{{ authUser.first_name + ' ' + authUser.surname }}</span>
            </div>

            <div :class="isAuth ? 'hide-item' : 'active-item login-links'">
                <div class="login-links">
                    <a class="sign-up  modal-sign-up" href="">Sign Up</a>
                    <a class="sign-in modal-sign-in" href="">Log In</a>
                </div>
            </div>
<!--            {{ Auth::check() ? 'active-item' : 'hide-item'}}-->
            <div :class="isAuth ? 'active-item logout-inner': 'hide-item'" style="padding: 13px">
                <a href="/sign-out" class="logout btn btn-primary">Logout</a>
            </div>
        </div>
<!------------------------ Modal Component Categories Component here ------------->
        <modal-component/>
<!------------------------- Course Categories Component here ------------->
        <course-categories/>
<!-------------------------- Course Types Component here -------------------->
        <course-type/>
<!----------------------------------------------------------------------->
    </div>
</template>

<script>
import ModalComponent from "../../components/Header/ModalComponent";
import CourseCategories from "../../components/Header/CourseCategories";
import CourseType from "../../components/Header/CourseType";

export default {
    name: "IndexComponent",
    components : { ModalComponent, CourseCategories, CourseType },

    data (){
       return {
           isAuth : false,
           authUser : []
       }
    },

    mounted() {
        this.checkUserAuth();
    },

    methods : {
        async checkUserAuth() {
            await this.axios.get('/get/user')
            .then( response =>{
                if (response.data.user == null ){
                    this.isAuth = false;
                }
                else {
                    this.isAuth = true;
                    this.authUser = response.data.user
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    }

}
</script>

<style scoped>
.active-item > span {
    color: #fff;
    font-weight: 700;
}
.active-item > img {
    width: 50px;
    height: 45px;
}
</style>
