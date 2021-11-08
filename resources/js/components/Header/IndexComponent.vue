<template>

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

            <div :class="isAuth ? 'active-item dropdown': 'hide-item'" style="padding: 13px">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ authUser.first_name }}</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>http://127.0.0.1:8002/
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdowz`n-item" href="#">Something else here</a>
                </div>
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

</style>
