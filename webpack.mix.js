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
    'resources/asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
    'resources/asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
    'resources/asset/plugins/jqvmap/jqvmap.min.css',
    'resources/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
    'resources/asset/plugins/daterangepicker/daterangepicker.css',
    'resources/asset/plugins/summernote/summernote-bs4.min.css',
    'resources/asset/dist/css/adminlte.min.css',
    'resources/asset/plugins/fontawesome-free/css/all.css',

], 'public/css/admin.css');

mix.scripts([
    'resources/asset/plugins/jquery/jquery.min.js',
    'resources/asset/plugins/jquery-ui/jquery-ui.min.js',
    'resources/asset/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/asset/plugins/chart.js/Chart.min.js',
    'resources/asset/plugins/sparklines/sparkline.js',
    'resources/asset/plugins/jqvmap/jquery.vmap.min.js',
    'resources/asset/plugins/jqvmap/maps/jquery.vmap.usa.js',
    'resources/asset/plugins/jquery-knob/jquery.knob.min.js',
    'resources/asset/plugins/moment/moment.min.js',
    'resources/asset/plugins/daterangepicker/daterangepicker.js',
    'resources/asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/asset/plugins/summernote/summernote-bs4.min.js',
    'resources/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
    'resources/asset/plugins/chart.js/Chart.min.js',
    'resources/asset/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/asset/dist/js/adminlte.js',
    'resources/asset/dist/js/demo.js',
    'resources/asset/dist/js/pages/dashboard.js',

], 'public/js/admin.js');

mix.copy('resources/asset/dist/img', 'public/dist/img');
mix.copy('resources/asset/plugins/fontawesome-free/webfonts', 'public/webfonts');

