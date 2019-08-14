
<?php

use App\Events\WebsocketEvent;

Route::resource('consultants', 'ConsultantController');

Route::resource('timeservice', 'TimeServiceController');

Route::get('/', function () {
    broadcast(new WebsocketEvent('some data'));
    return view('welcome');
});

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
    

Route::get('/home', 'HomeController@index', )->name('home');

Route::resource('users', 'auth\RegisterController');


// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });