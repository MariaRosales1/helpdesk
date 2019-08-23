<?php

Route::get('/', function () {
    return view('welcome');
});
//Routes for customer
Route::get('registerCustomer', 'CustomerController@index');
Route::post('registerCustomer', 'CustomerController@store');
Route::get('chatCustomer', 'CustomerController@chat');

//Routes for ticket
Route::get('listTickets', 'TicketController@index');
// Route::post('tickets', 'CustomerController@edit');
Route::get('listTickets', 'TicketController@edit');;
Route::post('listTickets', 'TicketController@update');
Route:: resource('tickets', 'TicketController');

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
    //  Route::resource('users', 'auth\RegisterController');
    //TimeService  
    Route::resource('timeservice', 'TimeServiceController')
    ->only(['create', 'store']);

    Route::resource('consultants', 'ConsultantController');
});


Route::group(['middleware' => 'permissionConsultant'], function () {

});

