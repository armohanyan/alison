<template>
    <div class="category-list">
        <div class="color-change">
            <ul class="ul-category-list">
                <li @mouseover.capture="changeBorderColor"
                    @mouseout="onmouseOut" v-for="(category, index) in courseCategories"
                    :key="index"
                    :style="styleObject">
                    <a :id="index" class="sm-link"><i class="fa fa-desktop" aria-hidden="true"></i> <br>
                        <span class="category-name">{{ category.name }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
export default {
    name: "CourseCategories",

    data() {
        return{
            courseCategories : [],
            changeColor : false,
            styleObject: {
                'border-bottom': ''
            }
        }
    },

    mounted() {
        this.getCourseCategories()
    },

    methods: {
        changeBorderColor: function (event) {
            let rand = ( Math.random()*0xFFFFFF<<0).toString(16)
            event.target.style.borderBottom = '4px solid #' + rand;

        },
        onmouseOut : function (event) {
            event.target.style.borderBottom = 'none'
        },

        async getCourseCategories() {
            await this.axios.get('/api/get/categories')
            .then( response => {
                this.courseCategories = response.data.categories
            })
            .catch(error => {category-list
                console.log('Upss! something went wrong')
                this.categories = []
            })
        }
    },
}
</script>

<style scoped>


.category-list{
    height: 130px;
    position: absolute;
    display: none;
    width: 100%;
    background-color:#f7f7f7;
    box-shadow: 0 4px 5px 0 rgb(0 0 0 / 75%);
    padding-top:10px ;
    text-align: center;
    z-index:2;
    top: 64px;
}
.ul-category-list{
    max-width: 95%;
    justify-content: center;
    list-style-type: disc;
    display: flex;
    flex-wrap:wrap;
}

.ul-category-list > li{
    margin-left:15px ;
    max-width: 15%;
}

.ul-category-list > li :hover {
    color: #566d7f;
}

.sm-link{
    background-color: #e9edf1;
    display: inline-block;
    color: #566d7f;
    width: 130px;
    height: 114px;
    vertical-align: middle;
    padding-top: 9px;
    border-bottom: 7px solid #fff;
}

li > * {
    pointer-events: none;
}

.sm-link :hover{
    display: inline-block;
    color: #566d7f;
}

.sm-link i {
    font-size: 35px;
    opacity: 0.7;
    font-weight: 100;
    margin-bottom: 7px;
    display: inline-block;
}

/*.fa-desktop{*/
/*    border-bottom : none !important*/
/*}*/
/*.category-name{*/
/*    border-bottom : none !important*/
/*}*/

</style>
