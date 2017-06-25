<?php

Route::group(['as' => 'site.', 'namespace' => 'Site'], function() {
    Route::get('', ['as' => 'index', 'uses' => "SiteController@index"]);

    require 'member.php';
});