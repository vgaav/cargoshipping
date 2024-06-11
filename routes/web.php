<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\CarrierDashboardController;

Route::get('/carrier-dashboard', [CarrierDashboardController::class, 'index']);
Route::post('/submit-bid', [CarrierDashboardController::class, 'submitBid'])->name('submit.bid');

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Routes below are better suited for api.php and should be removed from web.php
// Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
// Route::get('/items/{id}', [ItemController::class, 'show']);

//Route::get('/api/items', [ItemController::class, 'getItems']);


Route::get('/check-database', function () {
    $items = DB::table('items')->get();
    return view('check-database', ['items' => $items]);
});


// Catch-all route to handle frontend routing
Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', ".*");
