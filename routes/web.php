<?php

Route::resource('consultants', 'ConsultantController');

Route::get('/', function () {
    return view('welcome');
});
