const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')
const purgecss = require('@fullhuman/postcss-purgecss')({

  // Specify the paths to all of the template files in your project
  content: [
    './resource/**/*.html',
    './resource/**/*.vue',
    './resource/**/*.jsx',
    './resource/views/**/*.php',
    // etc.
  ],

  // Include any special characters you're using in this regular expression
  defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || []
})

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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
    .options({
      processCssUrls: false,
      postCss: [
        tailwindcss('./tailwind.config.js'),
        ...process.env.NODE_ENV === 'production'
          ? [purgecss]
          : []
      ],
    })

