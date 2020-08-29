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

mix.styles([
    'resources/asset/plugins/fontawesome-free/css/all.min.css',
    'resources/asset/dist/css/adminlte.min.css',

], 'public/css/admin.css');

mix.scripts([
    'resources/asset/plugins/jquery/jquery.min.js',
    'resources/asset/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js',
    'resources/asset/dist/js/adminlte.min.js',
    'resources/asset/dist/js/demo.js',

], 'public/js/admin.js');

mix.copy('resources/asset/dist/img/AdminLTELogo.png', 'public/dist/img/AdminLTELogo.png');
mix.copy('resources/asset/plugins/fontawesome-free/webfonts', 'public/webfonts');

