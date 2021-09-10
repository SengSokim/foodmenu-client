const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/dist/js')
    .js('resources/js/axios.js', 'public/dist/js')
    .sass('resources/sass/app.scss', 'public/dist/css')

    //Product Variant
    .js('resources/js/product-variants/create.js', 'public/dist/js/product-variants')
    .js('resources/js/product-variants/edit.js', 'public/dist/js/product-variants')


