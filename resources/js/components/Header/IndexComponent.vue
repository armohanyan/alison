<template>

    <div class="header-inner">
        <div class="header-main">
            <div class="part-left p-2 flex-grow-1">
                <div class="logo">
                    <a href="/"><img class="logo-image" src="/images/alison.svg" alt=""></a>
                </div>
                <div class="search">
                    <div class="custom-search">
                        <input type="text" class="custom-search-input" placeholder="Search for courses" v-model="searchValue">
                        <button class="custom-search-botton" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="searchResult" v-if="searchResults.length > 0">
                        <ul>
                           <li v-for="(searchResult, index) in searchResults" :key="index"><a :href="'/category/'+ searchResult.id +'/courses'">{{ searchResult.name }}</a> </li>
                        </ul>
                    </div>
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
            authUser : [],
            searchValue : null,
            searchResults : [],  
            hoverSearchResult : false
       }
    },

    mounted() {
        this.checkUserAuth();
    },

    watch: {
        searchValue(after, before) {
            if(this.searchValue.length > 0){
                this.getSearchResults();
                if( this.searchResults.length > 0 ){

                }
            }
            this.searchResults = [];
        }
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
        },

        async getSearchResults() {
  
            await axios.post('/api/search/course', { searchValue: this.searchValue } )
                .then(response => {
                    this.searchResults = response.data ;
                } )

                .catch(error => {});
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

.searchResult { 
    background-color: #fff;
    width:245px;
    padding:5px; 
    border-radius: 10px;
    position: absolute;
    z-index: 1000;
}

.searchResult ul li {
    border-bottom:1px solid rgba(0, 0, 0, .2);
    padding:10px;
}

.searchResult ul li a {
    color: #000;
}  

.searchResult ul li:hover{
    background:#f0f0f0;    
}

</style>
