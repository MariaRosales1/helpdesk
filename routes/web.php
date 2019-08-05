
<?php

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'permissionAdmin'], function () {
    //Route::resource('consultants', 'ConsultantController');
    Route::resource('timeservice', 'TimeServiceController');
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    //users
    Route::resource('users', 'auth\RegisterController')->middleware('permissionAdmin');
});

Route::group(['middleware' => 'permissionConsultant'], function () {
    
});
