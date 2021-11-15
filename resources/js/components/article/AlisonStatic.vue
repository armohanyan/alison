<template>
    <div class="alison-statics">
        <div class="statics-inner">
            <div class="learners-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/learners.svg" alt=""></span>
                <span class="numbers">{{ alisonStatics.learnersQuantity }}</span>
                <span class="static-title">Learners</span>
            </div>
            <div class="graduates-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/graduates.svg" alt=""></span>
                <span class="numbers">10</span>
                <span class="static-title">Graduates</span>
            </div>
            <div class="courses-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/courses.svg" alt=""></span>
                <span class="numbers">{{ alisonStatics.courseQuantity }}</span>
                <span class="static-title">Courses</span>
            </div>
            <div class="countries-number">
                <span><img src="https://cdn01.alison-static.net/public/html/site/img/home-stats/countries.svg" alt=""></span>
                <span class="numbers">195</span>
                <span class="static-title">Countries</span>
            </div>
        </div>
    </div>
</template>

<script>

export default ({

   name : 'AlisonStatic',

   data(){
       return {
          alisonStatics : [],
       }
   },

    mounted() {
        this.getStatics()
    },

    methods : {
        async getStatics(){
            await this.axios.get('/api/get/statics')
            .then( response => {
                this.alisonStatics = response.data.alisonStatics
            })
            .catch(error => {
                console.log(error)
                this.alisonStatics = []
            })
        }
    }

})
</script>


<style scoped>

</style>
