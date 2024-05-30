<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItineraryController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;


Route::get('/', [HomeController::class, 'index2']);


Route::get('/login', [HomeController::class, 'login'])->middleware('auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/loginsuccessful/{id}', [HomeController::class, 'loginsuccessful'])->name('loginsuccessful')->middleware('auth');

Route::post('/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store')->middleware('auth');
Route::get('/itineraries/{itinerary}', [ItineraryController::class, 'show'])->name('itineraries.show');
Route::delete('/itineraries/{itinerary}', [ItineraryController::class, 'destroy'])->name('itineraries.destroy');
