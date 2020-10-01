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

mix .js('resources/js/main.js', 'public/build')
    .js('resources/js/compare-forms/dynamic.edit.js', 'public/build/compare-forms')
    .js('resources/js/compare-forms/laravel.add.js', 'public/build/compare-forms')
    .version()
    .sass('resources/sass/main.scss', 'public/build')
    .sass('resources/sass/compare-forms/dynamic.edit.scss', 'public/build/compare-forms')
    .copyDirectory('resources/webfonts', 'public/fonts')
    .sourceMaps(false);
