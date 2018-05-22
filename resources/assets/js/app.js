
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('address-search-box', require('./components/addressSearchBoxWithMap'));
Vue.component('city-search-box', require('./components/citySearchFieldAutoComplete'));
Vue.component('nearest-clubs', require('./components/nearestClubs'));
Vue.component('nearest-events', require('./components/nearestEvents'));
// Vue.component('slider', require('./components/slider'));

const app = new Vue({
    el: '#app'
});
