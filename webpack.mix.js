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

mix.styles(['resources/css/app.css',
            'resources/css/header.css',
            'resources/css/footer.css',
            'resources/css/components.css',
            'resources/css/activities.css',
            'resources/css/books.css',
            'resources/css/feedback.css',
            'resources/css/home.css',
            'resources/css/notifications.css',
            'resources/css/presentation.css',
            'resources/css/profile.css',
            'resources/css/rating.css',
            'resources/css/rules.css',
            'resources/css/about.css'], 'public/css/styles.css')

    .js(['resources/js/about.js',
        'resources/js/activities.js',
        'resources/js/books.js',
        'resources/js/feedback.js',
        'resources/js/home.js',
        'resources/js/main.js',
        'resources/js/notifications.js',
        'resources/js/presentation.js',
        'resources/js/profile.js',
        'resources/js/rating.js',
        'resources/js/rules.js'], 'public/js/scripts.js')

    .version();

