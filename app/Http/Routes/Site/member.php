<?php

Route::group(['prefix' => 'membro', 'as' => 'member.', 'namespace' => 'Member'], function () {
    Route::get('entrar', ['as' => 'showLogin', 'uses' => 'AuthController@showLoginForm']);
    Route::post('entrar', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::get('sair', ['as' => 'logout', 'uses' => 'AuthController@logout']);

    Route::post('senha/email', ['as' => 'sendResetLink', 'uses' => 'PasswordController@sendResetLinkEmail']);
    Route::get('senha/resetar/{token?}', ['as' => 'showReset', 'uses' => 'PasswordController@showResetForm']);
    Route::post('senha/resetar', ['as' => 'reset', 'uses' => 'PasswordController@reset']);

    Route::get('cadastrar', ['as' => 'create', 'uses' => 'AuthController@create']);
    Route::post('cadastrar', ['as' => 'store', 'uses' => 'AuthController@store']);

    Route::get('verificar-disponibilidade-email', ['as' => 'verifyEmailUnique', 'uses' => 'AuthController@verifyEmailUnique']);

    Route::get('', ['as' => 'index', 'uses' => 'MemberController@index']);
    Route::post('cumprir-desafio', ['as' => 'meetChallenge', 'uses' => 'MemberController@meetChallenge']);
});