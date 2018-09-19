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

import VueRouter from 'vue-router';


window.jquery_ui = require('jquery-ui');

window.Vue = require('vue');

Vue.use(VueRouter);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('image-component', require('./components/Imageupload.vue'));
Vue.component('images-upload', require('./components/ImagesUpload'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('flash-message', require('./components/FlashMessage'));
Vue.component('flash', require('./components/FlashMessage.vue'));
Vue.component('address-search-box', require('./components/addressSearchBoxWithMap'));
Vue.component('city-search-box', require('./components/citySearchFieldAutoComplete'));


// Vue.component('nearest-clubs', require('./components/nearestClubs'));
Vue.component('nearest-events', require('./components/nearestEvents'));
Vue.component('take-part', require('./components/takePartComponent'));
Vue.component('slick-slider', require('./components/SlickSlider'));
Vue.component('google-map', require('./components/GoogleMap'));

/* CLUBS COMPONENTS */
Vue.component('clubs-main', require('./components/Clubs/Main'));
Vue.component('search-clubs', require('./components/Clubs/Search'));
Vue.component('clubs-header', require('./components/Clubs/Header'));
Vue.component('single-club-loop', require('./components/Clubs/SingleClubLoop'));
Vue.component('clubs-nearest', require('./components/Clubs/NearestClubs'));
Vue.component('club-rate', require('./components/Clubs/RateClub'));
Vue.component('club-gallery-manager', require('./components/Clubs/GalleryManager'));


const ClubsMain = Vue.component('clubs-main', require('./components/Clubs/Main.vue'));
const Search = Vue.component('Search', require('./components/Clubs/SearchResults'));
// const SingleClub = Vue.component('SingleClub', require('./components/Clubs/SingleClub'));

/* END OF CLUBS COMPONENTS */
Vue.component('single-event-loop', require('./components/Events/SingleEventLoop'));
Vue.component('events-nearest-location', require('./components/Events/NearestEvents'));
Vue.component('events-nearest-date', require('./components/Events/NearestEventsByDate'));
/* EVENTS COMPONENTS */

/* END OF EVENTS COMPONENTS */



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
    // {
    //     path: '/clubs/:id',
    //     component: SingleClub,
    //     name: 'singleClub'
    // }
]

const router = new VueRouter({routes});

/* This is cons with app URL */
// const appURL = 'http://localhost/goparty/public/';
const appURL = process.env.MIX_APP_URL;

const app = new Vue({
    router, scrollBehavior(to, from, savedPosition) {
        return {x: 0, y: 0}
    }
},).$mount('#app');

axios.defaults.baseURL = process.env.MIX_APP_URL;

Vue.prototype.$hostname = appURL;

window.events = new Vue();

window.flash = function(message) {
    window.events.$emit('flash',message);
}



