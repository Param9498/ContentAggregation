
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router'
import App from './views/App'
import SelectSemester from './views/SelectSemester.vue'
import NavBar from './components/NavBar.vue'

window.Vue = require('vue');
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/spa/SelectSemester',
            name: 'SelectSemester',
            component: SelectSemester
        },
        {
            path: '/spa/home',
            name: 'App',
            component: App
        }
    ],
});

const app = new Vue({
    el: '#app',
    components:{
        'nav-bar': NavBar
    },
    router
});
