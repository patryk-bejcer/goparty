
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import 'jquery-ui';
import 'jquery-ui/ui/effect.js';
import 'jquery-ui/ui/effects/effect-fade.js';
import 'jquery-ui/ui/effects/effect-blind.js';
import 'jquery-ui/ui/widgets/slider.js';
import 'jquery-ui/ui/widgets/autocomplete.js';
import 'jquery-ui/ui/widgets/resizable.js';
// import 'slick-carousel/slick/slick.js'

import VueRouter from 'vue-router';

window.jquery_ui = require('jquery-ui');

require("slick-carousel/slick/slick.min");
require("slick-carousel/slick/slick.css");
require("slick-carousel/slick/slick-theme.css");

window.Vue = require('vue');

Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('address-search-box', require('./components/addressSearchBoxWithMap'));
Vue.component('city-search-box', require('./components/citySearchFieldAutoComplete'));
Vue.component('nearest-clubs', require('./components/nearestClubs'));
Vue.component('nearest-events', require('./components/nearestEvents'));
Vue.component('take-part', require('./components/takePartComponent'));
Vue.component('clubs', require('./components/Clubs'));
Vue.component('clubs-main', require('./components/Clubs/Main'));
Vue.component('search-clubs', require('./components/Clubs/Search'));
Vue.component('clubs-header', require('./components/Clubs/Header'));
Vue.component('loader', require('./components/Clubs/Loader'));


const ClubsMain = Vue.component('clubs-main', require('./components/Clubs/Main.vue'));
const Clubs = Vue.component('Clubs', require('./components/Clubs.vue'));
const Home = Vue.component('Home', require('./components/Home.vue'));
const Search = Vue.component('Search', require('./components/Clubs/SearchResults'));

// Vue.component('slider', require('./components/slider'));

axios.defaults.baseURL = 'http://localhost/goparty/public/';



const routes = [
    {
        path: '/clubs',
        name: 'clubs',
        components: {
            clubs: ClubsMain
        }
    },
    {
        path: '/clubs/search/:city',
        component: Search,
        name: 'search'
    },


]

const router = new VueRouter({ routes });

const appURL = 'http://localhost/goparty/public/';

const app = new Vue({ router }).$mount('#app');

var vm1 = new Vue({
    el: '#vm1',
    data: {
        name: 'Vue Instance #1'
    }
});
