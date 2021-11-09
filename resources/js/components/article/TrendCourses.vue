<template>
    <div class="cours-list-row trending-courses">
        <a v-for="(courseArray, index) in coursesArray" :key="index" href="google.com"
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
             hideBlockIntro(index) {
                 this.coursesArray[index].hoverBlockIntro = false;
             },

            showBlockIntro(index){
                this.coursesArray[index].hoverBlockIntro = true;
             },

            async getCourses() {
                await this.axios.get('/api/get/courses')
                .then( response => {
                    console.log(response.data.courses)
                    this.coursesArray =  response.data.courses;
                    this.coursesArray.forEach((value, index) => {
                        this.$set( this.coursesArray[index], 'hoverBlockIntro', false)
                    });
                })
                .catch( error =>{
                    console.log(error)
                })
            },

            getImageFromPublic(){
                return '/images/'
            }
        }
    }
</script>

<style scoped>

</style>
