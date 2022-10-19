const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.js('resources/js/pages/bip/bip_index.js','public/js/pages/bip')
mix.js('resources/js/pages/others/master_settings.js','public/js/pages/others')
mix.js('resources/js/pages/sls/sls_index.js','public/js/pages/sls')

