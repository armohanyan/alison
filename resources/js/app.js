/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;
import

IndexComponent from './components/Header/IndexComponent';
import ArticleIndex from './components/article/ArticleIndex';
import IndexFooter from './components/footer/IndexFooter';
import CoursesComponent from './components/article/CoursesComponent.vue';

import Vue from "vue";
import
axios from 'axios' ;
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router'

Vue.use(VueRouter);
Vue.config.productionTip = false;
Vue.use(VueAxios, axios);

new Vue({
        // store,
    render: h => h(IndexComponent ),
}).$mount("#app");

if( document.getElementById('article-courses') ){
    new Vue({
        // store,
        render: h => h(ArticleIndex),
    }).$mount("#article-courses");
}

if( document.getElementById('footer-component') ){
    new Vue({
        render: h => h(IndexFooter),
    }).$mount("#footer-component");
}

if( document.getElementById('courses-component') ){
    new Vue({
        render: h => h(CoursesComponent),
    }).$mount("#courses-component");
}
