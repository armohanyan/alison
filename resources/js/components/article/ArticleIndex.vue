<template>
    <div class="courses-list-body">
        <div class="courses-list">
            <ul class="courses-list-ul">
                <li><a @click = "clickCourses">Courses</a></li>
                <li><a @click = "clickMostPopular">Most Popular</a></li>
                <li><a @click = "clickMostRecent">Most Recent</a></li>
            </ul>
        </div>
        <div class="main-cours-list">
            <div class="cours-list-row trending-courses">
                <a v-for="(courseArray, index) in coursesArray" :key="index" :href="/show/ + courseArray.id"
                   title="" @mouseenter="showBlockIntro(index)" @mouseleave="hideBlockIntro(index)"
                   :data-id="courseArray.id">
                    <div class="course-block">
                        <div class="cl-image">
                            <img :src="getImageFromPublic() + courseArray.img">
                        </div>
                        <div class="course-block-content">
                            <span class="block-content-type">{{ courseArray.course_type.name }}</span>
                            <span class="block-content-category">{{ courseArray.category.name }}</span>
                            <h3 class="course-type-title">
                                <div title="title-inner-div">
                                    <span>{{ courseArray.title }}</span>
                                </div>
                            </h3>
                        </div>

                        <div v-if="courseArray.hoverBlockIntro" class="course-block-intro" >
                            <div class="social-links">
                                <a href=""><img src="https://img.icons8.com/color/48/000000/linkedin.png"/></a>
                                <a href=""><img src="https://img.icons8.com/color/48/000000/facebook-new.png"/></a>
                                <a href=""><img src="https://img.icons8.com/color/48/000000/twitter--v2.png"/></a>
                            </div>
                            <div class="div-course-title">
                                <span class="course-title">{{ courseArray.title }}</span>
                            </div>
                            <div class="publisher">
                                <span><i class="fa fa-university" aria-hidden="true">{{ courseArray.publisher }}</i></span>
                            </div>
                            <div class="course-intro">
                                <span>{{ courseArray.description }}</span>
                            </div>
                            <div class="more-info">
                                <a href="" class="">More Information <i class="fa fa-question-circle" aria-hidden="true"></i> </a>
                            </div>
                        </div>
                        <div class="parent-div-startnow">
                            <div class="child-div-startnow">
                                <a :href="/show/ + courseArray.id">Start Now </a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="btn-more-courses">
                <a href=""  class="more-courses-link" title="More Courses">More Courses</a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "TrendCourses" ,
    data() {
        return {
            coursesArray : [],
        }
    },

    mounted() {
        this.getCourses()
    },

    methods : {
        clickCourses: function (e) {
            this.getCourses('courses')
        },

        clickMostPopular: function () {
            this.getCourses('popular')
        },

        clickMostRecent: function () {

        },

        hideBlockIntro(index) {
            this.coursesArray[index].hoverBlockIntro = false;
        },

        async getCourses(type) {
            let url = '';
            if(type == 'recent') {
                // url = '/api/get/courses';
            }
            else if(type == 'popular') {
                url = '/api/get/most-popular/courses';
            }
            else {
                url = '/api/get/courses';
            }
            await this.axios.get(url)
                .then(response => {
                    if (url == '/api/get/most-popular/courses' ){
                        this.coursesArray = response.data.mostPopularCourses;
                    }
                    else {
                        this.coursesArray = response.data.courses;
                    }
                    this.coursesArray.forEach((value, index) => {
                        this.$set(this.coursesArray[index], 'hoverBlockIntro', false)
                    });
                })
                .catch(error => {
                    console.log(error)
                })
        },

        showBlockIntro(index){
            this.coursesArray[index].hoverBlockIntro = true;
        },

        getImageFromPublic(){
            return '/images/'
        }
    },

    watch : {
        clickedCourses : function (newVal, oldVal){
            console.log('Prop changed: ', newVal, ' | was: ', oldVal)
        }
    }
}

</script>

<style scoped>
.child-div-startnow > a{
    color: #fff;
}
</style>
