/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


import Vue from "vue";
import axios from 'axios'
import VueAxios from 'vue-axios'

import LoginComponent from './components/LoginComponent';
import ModalComponent from './components/ModalComponent';

Vue.config.productionTip = false;

Vue.use(VueAxios, axios)

Vue.component('my-component', LoginComponent);

new Vue({
    render: h => h(ModalComponent)
}).$mount("#app");
