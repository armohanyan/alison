<template>
<div class="main-cours-list">
    <div class="cours-list-row trending-courses">
        <a v-for="(courseArray, index) in coursesArray" :key="index" :href="/show/ + courseArray.id"
            title="" @mouseenter="showBlockIntro(index)" @mouseleave="hideBlockIntro(index)"
            :data-id="courseArray.id">
            <div class="course-block">
                <div class="cl-image">
                    <img :src="/images/ + courseArray.img">
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
        <button v-if="hoverMoreCoursesButton" @click="loadMoreCourses" class="more-courses-link" title="More Courses">More Courses</button>
    </div>
</div>
</template>

<script>

export default ({
    
    data() {
        return {
            coursesArray : [],
            hoverMoreCoursesButton : true,
            currentCourseType : null,
            categoryOrCourseId : null,
        }
    },

    mounted() {

        if(window.categoryId){
            this.getCourses(`category/${window.categoryId}/courses`)
        }
        else if(window.courseTypeId){
            this.getCourses(`courstype/id/${window.courseTypeId}/courses`)
        }
        else { 
            this.getCourses()
        }
    },

    methods : {

        hideBlockIntro(index) {
            this.coursesArray[index].hoverBlockIntro = false;
        },

        async getCourses(type) {
            this.hoverMoreCoursesButton = true
            let url = '';
            
            if(type == 'popular') {
                
                url = '/api/get/most-popular/courses';
                this.currentCourseType = "mostPopluar"
            }
            else if(type == `category/${window.categoryId}/courses`){

                url = `/api/get/category/${window.categoryId}/courses`
                this.currentCourseType = "coursesByCategory"
                this.categoryOrCourseId = window.categoryId
            }
            else if(type == `courstype/id/${window.courseTypeId}/courses`){

                url = `/api/get/courstype/id/${window.courseTypeId}/courses`
                this.currentCourseType = "coursesByType"
                this.categoryOrCourseId = window.courseTypeId
            }
            else {
                url = '/api/get/courses';     
                this.currentCourseType = "allCourses"
            }

            await this.axios.get(url)
                .then(response => {
                    let courses = response.data.courses;
                    this.coursesArray = courses.splice(0,5);

                    if( this.coursesArray.length <= 4){
                        this.hoverMoreCoursesButton = false
                    }
                    this.coursesArray.forEach((value, index) => {
                        this.$set(this.coursesArray[index], 'hoverBlockIntro', false)
                    });

                })
                .catch(error => {
                    console.log(error)
                })
        },

        loadMoreCourses(){
            
            let lastCourse = this.coursesArray[this.coursesArray.length - 1];
            let lastCourseId = lastCourse.id;
            var lastCourseIndex = this.coursesArray.indexOf(lastCourse);

            if ( this.categoryOrCourseId != null ){
                var categoryOrCourseId = this.categoryOrCourseId
            }

            this.axios.post('/api/load/more/courses', { lastCourseId, categoryOrCourseId , currentCourseType: this.currentCourseType })
                .then(response => {
                    let spliceCourses = response.data.moreCourses.splice(lastCourseIndex + 1, 5);

                    spliceCourses.forEach((value, index) => {
                        this.coursesArray.push(spliceCourses[index])
                    });

                    if( response.data.dbLastCourseId == this.coursesArray[this.coursesArray.length - 1].id){
                        this.hoverMoreCoursesButton = false
                    }

                    console.log(lastCourseId)
                    console.log(this.hoverMoreCoursesButton, "button"); 
                    console.log(this.coursesArray, "array"); 


                })
                .catch( error => {
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
})
</script>


<style scoped>
.main-cours-list{
    padding-top: 65px;
}

.child-div-startnow > a{
    color: #fff;
}
</style>