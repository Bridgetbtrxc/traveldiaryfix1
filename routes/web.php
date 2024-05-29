<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index2']);
Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/login', [HomeController::class, 'login']);
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');
