const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync('http://app.test'); // Cambia esto según tu servidor

if (mix.inProduction()) {
    mix.version();
}
