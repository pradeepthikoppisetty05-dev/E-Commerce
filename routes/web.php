<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

Route::get('/', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('root');

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::middleware('guest')->group(function () {
 
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('signup');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/', [AuthController::class, 'login'])->name('root.login');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
