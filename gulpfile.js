'use strict';

var gulp = require( 'gulp' );
var connect = require( 'gulp-connect' );
var files = [ '*.html', 'assets/css/*.css' ];

gulp.task( 'files', function() {
    gulp.src( files ).pipe( connect.reload() );
});

gulp.task( 'watch', function() {
    gulp.watch( files, [ 'files' ]);
});

gulp.task( 'connect', function() {
    connect.server({ livereload: true });
});

gulp.task( 'default', [ 'connect', 'watch' ]);