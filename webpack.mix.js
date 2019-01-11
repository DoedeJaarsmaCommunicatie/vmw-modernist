let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
    .js('vue/app.js', 'vue/vue.webpack.js')


mix
    .sass('styles/checkout__form.sass', 'styles/checkout__form.css')
    .sass('styles/general.sass', 'styles/general.css')
    .sass('styles/product__card.sass', 'styles/product__card.css')
    .sass('styles/product__filter.scss', 'styles/product__filter.css')
    .sass('styles/related__card.sass', 'styles/related__card.css')
    .sass('styles/shopping__cart.sass', 'styles/shopping__cart.css')
    .sass('styles/single__product.sass', 'styles/single__product.css')
    .sass('styles/vendor__card.sass', 'styles/vendor__card.css')
