<template>
    <div class="courses-list-body">
        <div class="courses-list">
            <ul class="courses-list-ul">
                <li><a href="">Courses</a></li>
                <li><a href="">Most Popular</a></li>
                <li><a href="">Most Recent</a></li>
                <li><a href="">Tags</a></li>
            </ul>
        </div>
        <div class="main-cours-list">
            <trend-courses/>
            <div class="btn-more-courses">
                <a href=""  class="more-courses-link" title="More Courses">More Courses</a>
            </div>
        </div>
    </div>
</template>

<script>

import TrendCourses from "./TrendCourses";
export default {
    name: "ArticleIndex",
    components: { TrendCourses }
}
</script>

<style scoped>

</style>
