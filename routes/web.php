<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'permissionAdmin'], function () {
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    //users
    Route::resource('users', 'auth\RegisterController');
    //TimeService  
    Route::resource('timeservice', 'TimeServiceController')->only(['create', 'store']);

    Route::resource('consultants', 'ConsultantController');

    Route::get('company', 'CompanyController@edit');
    Route::patch('company/{id}', 'CompanyController@update');
});

Route::group(['middleware' => 'permissionConsultant'], function () {

});

