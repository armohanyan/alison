<template>
    <div class="main-testimonials">
        <div class="main-testimonials-inner">
                <VueSlickCarousel @beforeChange="beforeChange" v-bind="settings"  v-if="bigTestimonials.length > 0 " >
                        <div v-for="(bigTestimonial, index) in bigTestimonials" :key="index" class="slick-item">
                            <div class="testimonials-left-image">
                                <div><img :src="getImageFromPublic() + bigTestimonial.author_img" alt=""></div>
                            </div>
                            <div class="testimonials-left-text">
                                <div  data-id="index"><i class="fa fa-quote-right" aria-hidden="true"></i><p>{{ bigTestimonial.body }}</p></div>
                            </div>
                        </div>
                </VueSlickCarousel>
            <div class="testimonials-right-inner">
                <div class="testimonials-bubble-image">
                    <div v-for="(smallTestimonial, index) in smallTestimonials" :key="index" class="testimonials-bubble-image-inner" >
                        <img  :id="'bubble-' + index" class="" :src="getImageFromPublic() + smallTestimonial.author_img" alt="">
                        <div v-if="smallTestimonial['hoverBlock-' + index]"  class="testimonials-text bubble-after" :id="'bubble-image-' + index"><span>{{ smallTestimonial.body }}</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonials-wrapper-left-triangle">
            <img src="https://cdn01.alison-static.net/public/html/site/img/testimonials/testimonials-triangle.png" alt="">
        </div>
        <div class="testimonials-wrapper-right-triangle">
            <img src="https://cdn01.alison-static.net/public/html/site/img/testimonials/testimonials-triangle.png" alt="">
        </div>
    </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

export default {

    name: "Testimonials",

    components: {
        VueSlickCarousel
    },

    data() {
      return {
          bigTestimonials : [],
          smallTestimonials : [],
          settings : {
               autoplay : true,
               autoplaySpeed : 5000,
               pauseOnHover : true,
              'dots' : true,
              "infinite" : true,
              "speed" : 1000,
              "slidesToShow" : 1,
              "slidesToScroll" : 1,
              "rtl" : true,
              "dotsClass" : "slick-dots custom-dot-class"
          },
      }
    },

    mounted(){
        this.getTestimonials();
    },

    methods : {
        async getTestimonials(){
            await this.axios.get('/api/get/testimonials')
            .then( response => {

                this.bigTestimonials = response.data.bigTestimonials;
                this.smallTestimonials = response.data.smallTestimonials;

                this.smallTestimonials.forEach((value, index) => {
                    this.$set(this.smallTestimonials[index], 'hoverBlock-' + index, false)
                });
            })
            .catch(error => {
                console.log(error)
            })
        },

        beforeChange : function (oldSlideIndex, newSlideIndex) {
            this.smallTestimonials[newSlideIndex]['hoverBlock-' + newSlideIndex] = true
            this.smallTestimonials[oldSlideIndex]['hoverBlock-' + oldSlideIndex] = false
        },

        getImageFromPublic(){
            return '/images/'
        }
    }



}

</script>

<style scoped>
.slick-item {
    width: 70% !important;
    display:flex !important;
    justify-content: flex-start;
    flex-wrap: wrap;
    align-items:center;
}
</style>
