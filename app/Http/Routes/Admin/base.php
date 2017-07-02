<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);

    require 'challenge.php';

    require 'member.php';

    require 'user.php';

    require 'gallery.php';

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});