/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;

import IndexComponent from './components/Header/IndexComponent';
import ArticleIndex from './components/article/ArticleIndex'; 
import Vue from "vue";
// import store from './store'
// import VueSocketIO from 'vue-socket.io'
import axios from 'axios' ;
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router'

Vue.use(VueRouter);
Vue.config.productionTip = false;
Vue.use(VueAxios, axios);

// Vue.use(new VueSocketIO({
//     debug: true,
//     connection: 'http://127.0.0.1:8002',
//     vuex: {
//         store,
//         actionPrefix: 'SOCKET_',
//         mutationPrefix: 'SOCKET_'
//     },
//     options: { path: "/my-app/" } //Optional options
// }))
 

new Vue({
        // store,
    render: h => h(IndexComponent ),
}).$mount("#app");

new Vue({
    // store, 
    render: h => h(ArticleIndex),
}).$mount("#article-courses");
