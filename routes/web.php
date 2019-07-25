
<?php

Route::resource('consultants', 'ConsultantController');

Route::resource('timeservice', 'TimeServiceController');

Route::get('/', function () {
    return view('welcome');
});
