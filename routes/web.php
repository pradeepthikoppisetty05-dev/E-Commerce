<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

<<<<<<< HEAD
Route::get('/card/edit', [CardController::class, 'edit'])->name('card.edit');


Route::resource('card', CardController::class);
=======
>>>>>>> 0a54f5a6ebf1ee1e767211bea1331a1a7a1d776e

Route::get('/signup', [SignupController::class, 'create'])->name('signup');
// Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::match(['get','post'], '/login', [LoginController::class, 'create'])->name('login');

