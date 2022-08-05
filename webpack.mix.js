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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');


mix.js([
    "resources/js/validations/employee/register.js",
], "public/js/employee/validations.js");


mix.js([
    "resources/js/validations/admin/company.js",
], "public/js/admin/validations.js");



// datatables
mix.js([
    "resources/js/datatables/admin/dashboard.js",

], "public/js/admin/datatables.js");
