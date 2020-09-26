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
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')
var CaseSensitivePathsPlugin = require('case-sensitive-paths-webpack-plugin');



/* var webpackConfig = {
    plugins: [
        new CaseSensitivePathsPlugin(),
        new VuetifyLoaderPlugin()
    ]
    // other webpack config ...
} */

mix.js('resources/js/app.js', 'public/js')
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/sass')
            }
        },
        plugins: [
            new CaseSensitivePathsPlugin(),
            new VuetifyLoaderPlugin()
        ]
    })
    .sass('resources/sass/app.scss', 'public/css');
