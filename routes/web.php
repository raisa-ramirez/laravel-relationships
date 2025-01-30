<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('level/{id}', [UserController::class, 'level'])->name('level');