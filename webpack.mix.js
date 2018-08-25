let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    // 'public/css/font-awesome.min.css',
    // 'public/css/portal.css',
    // 'public/css/home.css',
    // 'public/css/events.css',
    // 'public/css/clubs.css',
    // 'public/css/dashboard.css',
    // 'public/css/global.css',
    // 'public/css/hover-min.css',
    // 'public/css/rating.css',
], 'public/css/all.css');

