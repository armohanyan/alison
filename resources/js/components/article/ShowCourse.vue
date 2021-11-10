<template>
    <div class="main">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto deserunt facilis temporibus vero? Alias amet eius eum magni omnis tempore! Amet cumque enim est hic, labore nobis nulla obcaecati vero?
    </div>
</template>

<script>
export default {
    name: "ShowCourse",
    props: [
       'courseID'
    ],
    mounted () {
        console.log(this.courseID)
    }
}
</script>

<style scoped>

</style>
