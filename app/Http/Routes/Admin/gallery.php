<?php

Route::group(['prefix' => 'galeria', 'as' => 'gallery.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'GalleryController@index']);
    Route::post('guardar', ['as' => 'store', 'uses' => 'GalleryController@store']);
    Route::get('remover/{id}', ['as' => 'destroy', 'uses' => 'GalleryController@destroy']);
});