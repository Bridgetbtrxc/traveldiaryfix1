<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;


Route::get('/', [HomeController::class, 'index2']);


Route::get('/login', [HomeController::class, 'login'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/login', [UserController::class, 'login'])->name('login');
