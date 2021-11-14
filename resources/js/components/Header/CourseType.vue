<template>
    <div class="course-type">
        <div class="color-change">
            <ul class="ul-course-type">
                <li @mouseover.capture="changeBorderColor"
                    @mouseout="onmouseOut" v-for="(courseType, index) in courseTypes" :key="index">
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

        changeBorderColor: function (event) {
            let rand = ( Math.random()*0xFFFFFF<<0).toString(16)
            event.target.style.borderBottom = '4px solid #' + rand;

        },
        onmouseOut : function (event) {
            event.target.style.borderBottom = 'none'
        },

        async getCourseTypes(){
            await this.axios.get('/api/get/course-types')
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
    li > * {
        pointer-events: none;
    }
</style>
