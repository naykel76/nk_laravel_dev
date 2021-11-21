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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/scss/jtb.scss', 'public/css/jtb.css');

// set MIX_DEV_URL in .env file for local development
mix.browserSync({
    proxy: process.env.MIX_DEV_URL,
    files: ['**/*.php', '**/*.js', '**/*.md', '**/*.scss']
});
