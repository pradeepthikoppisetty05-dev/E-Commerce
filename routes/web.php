<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/car/edit', [CarController::class, 'edit'])->name('car.edit');


Route::resource('car', CarController::class);

Route::get('/signup', [SignupController::class, 'create'])->name('signup');
// Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::match(['get','post'], '/login', [LoginController::class, 'create'])->name('login');

