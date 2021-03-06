<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'auth.login')->middleware('guest');

Route::namespace('Auth')->group(function() {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});

Route::group([
    'middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'dashboard',
], function() {

    Route::view('admin', 'admin.dashboard', ['name' => 'lol'])->name('admin.dashboard');
    Route::resource('categorias', 'CategoryController')->only(['store']);
    Route::resource('clientes', 'CustomerController');
    Route::resource('facturas', 'InvoiceController');
    Route::resource('productos', 'ProductController');

});
