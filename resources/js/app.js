/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';

// Router
import VueRouter from 'vue-router'
import routes from './router'

Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    routes,
})

// Bootstrap Directives
import { VBModal, VBToggle } from 'bootstrap-vue'
Vue.directive('b-modal', VBModal)
Vue.directive('b-toggle', VBToggle)

// Toastification
import Toast, { POSITION } from "vue-toastification"
Vue.use(Toast, {
    position: POSITION.BOTTOM_LEFT,
})

// Mixins
import mixin from './mixin'

// Components
Vue.component('home', require('./components/Home/Index.vue').default)
Vue.component('dashboard', require('./components/Admin/Index.vue').default)

const app = new Vue({
    el: '#app',
    router,
    mixin,
})
