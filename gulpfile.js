const elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

require('laravel-elixir-livereload');

elixir(function(mix) {
    mix.styles([
        '../../../public/bower_components/Ionicons/css/ionicons.min.css',
        '../../../public/bower_components/AdminLTE/plugins/pace/pace.min.css',
        '../../../public/bower_components/AdminLTE/plugins/select2/select2.min.css',
        '../../../public/bower_components/AdminLTE/plugins/datepicker/datepicker3.css',
        '../../../public/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css',
        '../../../public/bower_components/font-awesome/css/font-awesome.min.css',
        '../../../public/bower_components/noty/lib/noty.css',
        '../../../public/bower_components/animate.css/animate.min.css',
        '../../../public/bower_components/sweetalert/dist/sweetalert.css',
        '../../../public/bower_components/AdminLTE/dist/css/AdminLTE.min.css',

        '../../../public/assets/admin/css/*.css'
    ], 'public/assets/admin/css/min/admin.min.css');

    mix.styles([
        '../../../public/assets/site/css/*.css'
    ], 'public/assets/site/css/min/style.min.css');

    mix.copy('public/bower_components/font-awesome/fonts', 'public/assets/admin/css/fonts', false);
    mix.copy('public/bower_components/AdminLTE/bootstrap/fonts', 'public/assets/admin/css/fonts', false);
    mix.copy('public/bower_components/Ionicons/fonts', 'public/assets/admin/css/fonts', false);
    mix.copy('public/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css.map', 'public/assets/admin/css/min', false);

    // General dependency
    mix.scripts([
        '../../../public/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js',
        '../../../public/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js',
        '../../../public/bower_components/AdminLTE/dist/js/app.min.js',
        '../../../public/bower_components/AdminLTE/plugins/pace/pace.min.js',
        '../../../public/bower_components/mojs/build/mo.min.js',
        '../../../public/bower_components/noty/lib/noty.min.js',
        '../../../public/bower_components/AdminLTE/plugins/select2/select2.full.min.js',
        '../../../public/bower_components/bootstrap-validator/dist/validator.min.js',
        '../../../public/bower_components/sweetalert/dist/sweetalert.min.js',
    ], 'public/assets/admin/js/dependency.min.js');

    mix.livereload();
});