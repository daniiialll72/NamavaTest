/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue'
import Router from 'vue-router'
require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


//-------------components
import PurchaseComponent from './components/PurchaseComponent.vue'
import NamvaDashboardComponent from './components/NamvaDashboardComponent.vue'
import SalesDashboardComponent from './components/SalesDashboardComponent.vue'
import WalletsComponent from './components/WalletsComponent.vue'

Vue.component('invoice-component', require('./components/NamvaDashboardComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.use(Router);


//-------------routes
const routes = [
    {path: '/namava/dashboard', component: NamvaDashboardComponent},
    {path: '/sales/dashboard', component: SalesDashboardComponent},
    {path: '/purchase', component: PurchaseComponent},
    {path: '/wallet', component: WalletsComponent},

];

const router = new Router({
    routes // short for `routes: routes`
});

const app = new Vue({
    el: '#app',
    router,
    data: {
        addComp : false
    },

});
