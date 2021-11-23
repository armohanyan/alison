<template>
<div class="article-main">
    <div class="courses-list-body">
        <div class="courses-list">
            <ul class="courses-list-ul">
                <li><a @click = "clickCourses">Courses</a></li>
                <li><a @click = "clickMostPopular">Most Popular</a></li>
            </ul>
        </div>
        <courses-component ref="childRef"></courses-component>
    </div>
<!------------------------ Alison Static Component here ------------->
    <alison-static/>
<!------------------------- Testimonials Component here ------------->
    <testimonials/>
<!------------------------------------------------------------------->
</div>
</template>

<script>
import AlisonStatic from "../../components/article/AlisonStatic";
import Testimonials from "../../components/article/Testimonials.vue";
import CoursesComponent from '../../components/article/CoursesComponent.vue';

export default {

    components: {
        AlisonStatic,
        Testimonials,
        CoursesComponent
    },

    name: "TrendCourses" ,

    data() {
        return {
            coursesArray : [],
        }
    },

    methods : {

        clickCourses: function (e) {
             this.$refs.childRef.getCourses('courses');
        },

        clickMostPopular: function () {
             this.$refs.childRef.getCourses('popular');
        },
    }
}

</script>

<style scoped>
.child-div-startnow > a{
    color: #fff;
}
</style>
