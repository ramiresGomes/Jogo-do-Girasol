<?php

Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function() {
    Route::get('', ['as' => 'index', 'uses' => 'UsersController@index']);
    Route::get('adicionar', ['as' => 'create', 'uses' => 'UsersController@create']);
    Route::post('guardar', ['as' => 'store', 'uses' => 'UsersController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'UsersController@edit']);
    Route::post('alterar/{id}', ['as' => 'update', 'uses' => 'UsersController@update']);
    Route::get('remover/{id}', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
    Route::get('valida-email/{email?}/{id?}', ['as' => 'emailValidate', 'uses' => 'UsersController@emailValidate']);
});