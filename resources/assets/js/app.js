
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router'
import App from './views/App'
import SelectSemester from './views/SelectSemester'
import NavBar from './components/NavBar'
import Welcome from './views/Welcome'
import { store } from './store/store'
import SelectSubject from './views/SelectSubject'
import SelectUnit from './views/SelectUnit'

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
            path: '/spa/welcome',
            name: 'Welcome',
            component: Welcome
        },
        {
            path: '/spa/SelectSubject',
            name: 'SelectSubject',
            component: SelectSubject,
        },
        {
            path: '/spa/SelectUnit',
            name: 'SelectUnit',
            component: SelectUnit,
        }
    ],
});

const app = new Vue({
    store: store,
    el: '#app',
    components:{
        'app': App
    },
    created() {
        store.dispatch('loadData').then(response => {
            console.log("test "+response);
        });
        setInterval(function () {
            store.dispatch('loadData').then(response => {
                console.log("test "+response);
            });
          }.bind(this), 30000); 
    },
    mounted(){
        
    },
    router
});
