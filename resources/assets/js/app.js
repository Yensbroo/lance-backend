/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueInstantSearch from 'vue-instantsearch';

Vue.use(VueInstantSearch);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('project', require('./components/Project.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('profile', require('./components/Profile.vue'));
Vue.component('category', require('./components/Category.vue'));
Vue.component('admin', require('./components/Admin.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('flash', require('./components/Flash.vue'));

const app = new Vue({
    el: '#app',
});