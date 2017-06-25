<?php

Route::group(['prefix' => 'membros', 'as' => 'member.'], function () {
    Route::get('', ['as' => 'index', 'uses' => 'MemberController@index']);
    Route::get('adicionar', ['as' => 'create', 'uses' => 'MemberController@create']);
    Route::post('guardar', ['as' => 'store', 'uses' => 'MemberController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'MemberController@edit']);
    Route::post('alterar/{id}', ['as' => 'update', 'uses' => 'MemberController@update']);
    Route::get('remover/{id}', ['as' => 'destroy', 'uses' => 'MemberController@destroy']);
});