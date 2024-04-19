<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Login', function (){
    return view('welcome');
});

Route::get('/Register', function (){
    return view('welcome');
});