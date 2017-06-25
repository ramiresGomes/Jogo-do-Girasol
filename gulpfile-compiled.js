'use strict';

var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

require('laravel-elixir-livereload');

elixir(function (mix) {

    mix.styles(['../../../node_modules/bootstrap/dist/css/bootstrap.min.css', '../../../node_modules/font-awesome/css/font-awesome.min.css', '../../../node_modules/ionicons/dist/css/ionicons.min.css', '../../../public/bower_components/AdminLTE/plugins/pace/pace.min.css', '../../../public/bower_components/animate.css/animate.min.css'], 'public/css/styles.css');

    mix.browserify('main.js');

    mix.livereload();
});

//# sourceMappingURL=gulpfile-compiled.js.map