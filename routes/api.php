<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// Other routes...
Route::middleware('auth:api')->group(function () {
    // Protected routes here
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});