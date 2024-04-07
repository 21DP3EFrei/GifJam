<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/registration', [AuthController::class, 'showRegistrationForm'])->name('registration');
Route::post('/registration', [AuthController::class, 'register'])->name('registration.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome')->middleware('auth');
Route::group(['middleware' => 'auth'], function (){
    Route::get('profile', function (){
        return "Hi";
    });
});
