<template>
    <div class="course-type">
        <div class="color-change">
            <ul class="ul-course-type">
                <li v-for="(courseType, index) in courseTypes" :key="index">
                    <a class="sm-link" href=""><i class="fa fa-desktop" aria-hidden="true"></i><br>
                        <span class="category-name">{{ courseType.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>

export default {
    name: "CourseType",

    data(){
        return {
            courseTypes : [],
        }
    },

    mounted() {
        this.getCourseTypes()
    },

    methods : {
        async getCourseTypes(){
            await this.axios.get('api/get/course-types')
            .then( response => {
                this.courseTypes = response.data.courseTypes
            })
            .catch(error => {
                console.log(error)
                this.courseTypes= []
            })
        }
    }
}

</script>

<style scoped>

</style>
