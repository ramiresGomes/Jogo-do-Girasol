<?php

Route::get('login', ['as' => 'login', 'uses' => 'Admin\Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Admin\Auth\AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Admin\Auth\AuthController@logout']);

Route::get('password/reset/{token?}', ['as' => 'recovery-password', 'uses' => 'Admin\Auth\PasswordController@showResetForm']);
Route::post('password/email', ['as' => 'recovery-password', 'uses' => 'Admin\Auth\PasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'reset-password', 'uses' => 'Admin\Auth\PasswordController@reset']);