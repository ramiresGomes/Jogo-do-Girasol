<?php

Route::group(['prefix' => 'desafios', 'as' => 'challenge.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'ChallengeController@index']);
    Route::get('adicionar', ['as' => 'create', 'uses' => 'ChallengeController@create']);
    Route::post('guardar', ['as' => 'store', 'uses' => 'ChallengeController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'ChallengeController@edit']);
    Route::post('alterar/{id}', ['as' => 'update', 'uses' => 'ChallengeController@update']);
    Route::get('remover/{id}', ['as' => 'destroy', 'uses' => 'ChallengeController@destroy']);
});