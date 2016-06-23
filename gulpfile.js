var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.styles([
      'bootstrap.css',
      'custom.css',
      'font-awesome.css',
      'metisMenu.css',
      'plugins/morris.css',
      'sb-admin.css',

],'./public/css/libs.css');



mix.scripts([
  'jquery.js',
   'bootstrap.min.js',
   'npm.js',
   'metisMenu.js',
   '/plugins/morris/raphael.min.js',
   '/plugins/morris/morris.min.js',
   '/plugins/morris/morris-data.js',
   '/plugins/flot/excanvas.min.js',
   '/plugins/flot/flot-data.js',
   '/plugins/flot/jquery.flot.js',
   '/plugins/flot/jquery.flot.pie.js',
   '/plugins/flot/jquery.flot.resize.js',
   '/plugins/flot/jquery.flot.tooltip.min.js',
   
  ],'./public/js/libs.js');


});
