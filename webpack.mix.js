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

// mix.js('resources/assets/js/app.js', 'public/js');
/**
 * admin
 */
mix.js('resources/assets/admin/js/main.js', 'public/admin/js')
    .sass('resources/assets/admin/sass/app.scss', 'public/admin/css')
    .styles([
        'resources/assets/admin/assets/css/base.css',
        'resources/assets/admin/assets/css/global.css',
        // 'resources/assets/admin/assets/css/font-awesome.min.css'
    ], 'public/admin/css/base.css');
