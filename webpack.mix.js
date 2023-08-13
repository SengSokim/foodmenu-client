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

mix.js('resources/assets/js/app.js', 'public/dist/js')
    .js('resources/assets/js/axios.js', 'public/dist/js')
    .js('resources/assets/js/general.js', 'public/dist/js')
    .sass('resources/assets/sass/app.scss', 'public/dist/css')

    //Product Variant
    .js('resources/assets/js/product-variants/product-variant.js', 'public/dist/js/product-variants')

    //Product Category
    .js('resources/assets/js/categories/category.js', 'public/dist/js/categories')

    //Restaurant
    .js('resources/assets/js/restaurants/edit.js', 'public/dist/js/restaurants')

    //profile
    .js('resources/assets/js/profile.js', 'public/dist/js/profile')

    //product
    .js('resources/assets/js/products/product.js', 'public/dist/js/products')

    //register
    .js('resources/assets/js/register/register.js', 'public/dist/js/register')

    //telegram
    .js('resources/assets/js/setting/telegram/telegram.js', 'public/dist/js/setting')

    //users
    .js('resources/assets/js/users/user.js', 'public/dist/js/users')

    //tables
    .js('resources/assets/js/tables/table.js', 'public/dist/js/tables')

    //chart
    .js('resources/assets/js/charts/chart.js', 'public/dist/js/charts')

    .version();

