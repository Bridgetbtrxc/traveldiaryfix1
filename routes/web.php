<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItineraryController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;


Route::get('/login', [HomeController::class, 'LoginView']);
Route::get('/', [HomeController::class, 'CreateAccount']);


//Route::get('/login', [HomeController::class, 'MainView'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/loginsuccessful/{id}', [HomeController::class, 'MainView'])->name('loginsuccessful')->middleware('auth');

Route::post('/itineraries', [ItineraryController::class, 'store'])->name('itineraries.store')->middleware('auth');
Route::get('/itineraries/{itinerary}', [ItineraryController::class, 'show'])->name('itineraries.show');
Route::delete('/itineraries/{itinerary}', [ItineraryController::class, 'destroy'])->name('itineraries.destroy');

Route::post('/register', [UserController::class, 'register'])->name('register');
