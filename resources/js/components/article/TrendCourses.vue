<template>
    <div  class="cours-list-row trending-courses">
        <a v-for="courseArray in coursesArray" :key="index" href="google.com" title="">
            <div class="course-block">
                <div class="cl-image">
                    <img :src="{{ courseArray.img }}" alt="">
                </div>
                <div class="course-block-content">
                    <span class="block-content-type"></span>
                    <span class="block-content-category"></span>
                    <h3 class="course-type-title">
                        <div title="title-inner-div">
                            <span>{{ courseArray.title }} </span>
                        </div>
                    </h3>
                </div>

                <div class="course-block-intro">
                    <div class="social-links">
                        <a href=""><img src="https://img.icons8.com/color/48/000000/linkedin.png"/></a>
                        <a href=""><img src="https://img.icons8.com/color/48/000000/facebook-new.png"/></a>
                        <a href=""><img src="https://img.icons8.com/color/48/000000/twitter--v2.png"/></a>
                    </div>
                    <div class="div-course-title">
                        <span class="course-title" ></span>
                    </div>
                    <div class="publisher">
                        <span><i class="fa fa-university" aria-hidden="true"></i></span>
                    </div>
                    <div class="course-intro">
                        <span></span>
                    </div>
                    <div class="more-info">
                        <a href="" class="">More Information <i class="fa fa-question-circle" aria-hidden="true"></i> </a>
                    </div>
                </div>
                <div class="parent-div-startnow">
                    <div class="child-div-startnow">
                        <a title="" class="btn-start-now ">Start Now</a>
                    </div>
                </div>
            </div>
        </a>
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
            async getCourses() {
                await this.axios.get('/api/get/courses')
                .then( response => {
                    this.coursesArray =  response.data.courses
                    console.log( response.data.courses[0].img)
                })
                .catch( error =>{
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>
