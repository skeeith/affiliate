const mix = require('laravel-mix');

mix.sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .sourceMaps()
    .extract(['vue']);

if (mix.inProduction()) {
    mix.version();
}

mix.disableNotifications();
