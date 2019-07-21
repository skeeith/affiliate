<?php

// Login
Route::get('/login', 'AuthController@showLoginForm');
Route::post('/login', 'AuthController@login')->name('login');
Route::post('/logout', 'AuthController@logout');

// Forget Password
Route::get('password/reset/', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email/', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

// Reset Password
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('show-password-reset-form');
Route::post('password/reset/', 'Auth\ResetPasswordController@reset')->name('password.reset');

// Register
Route::get('register/', 'Auth\RegisterController@showRegistrationForm')->name('show-registration-form');
Route::post('register/', 'Auth\RegisterController@register')->name('register');

// Single Page Application
Route::get('/{any}', 'SpaController@index')->where('any', '.*')->name('index');
