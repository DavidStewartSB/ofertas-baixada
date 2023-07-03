let mix = require('laravel-mix');
let path = require('path');

mix.setResourceRoot('../');
mix.setPublicPath(path.resolve('./'));

mix.webpackConfig({
    watchOptions: {
        ignored: [
            path.posix.resolve(__dirname, './node_modules'),
            path.posix.resolve(__dirname, './css'),
            path.posix.resolve(__dirname, './js'),
            path.posix.resolve(__dirname, './'),
        ]
    },
    resolve: {
        alias: {
            'swiper': path.resolve(__dirname, 'node_modules/swiper/swiper-bundle.js')
        }
    }
});

mix.js('src/assets/js/app.js', 'src/dist/js');

mix.postCss("src/assets/css/app.css", "src/dist/css");

mix.postCss("src/assets/css/editor-style.css", "src/dist/css");

mix.postCss("src/assets/css/custom.css", "src/dist/css");

mix.browserSync({
    proxy: 'http://localhost:8080',
    host: 'localhost',
    open: 'external',
    port: 3000,
    files: [
        'src/*.php',
        'src/**/*.php',
        'src/**/*.js',
        'src/**/*.css'
    ],
});

if (mix.inProduction()) {
    mix.version();
} else {
    Mix.manifest.refresh = _ => void 0
}