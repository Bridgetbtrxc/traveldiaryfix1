<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ItineraryController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;


Route::get('/login', [HomeController::class, 'LoginView']);
Route::get('/', [HomeController::class, 'CreateAccount']);
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/loginsuccessful/{id}', [ItineraryController::class, 'listItinerariesByUser'])->name('loginsuccessful')->middleware('auth');

Route::post('/itineraries', [ItineraryController::class, 'createItinerary'])->name('itineraries.store')->middleware('auth');
Route::get('/itineraries/{itinerary}', [ItineraryController::class, 'viewItinerary'])->name('itineraries.show')->middleware('auth');
Route::delete('/itineraries/{itinerary}', [ItineraryController::class, 'deleteItinerary'])->name('itineraries.destroy');
Route::get('/my-itinerary', [ItineraryController::class, 'ItineraryList'])->name('itineraries.my')->middleware('auth');
Route::get('/itinerary-detail/{id}', [ItineraryController::class, 'ItineraryDetail'])->name('itineraries.detail')->middleware('auth');

Route::post('/expenses', [ExpenseController::class, 'addExpense'])->name('expenses.store');
Route::delete('/expenses/{expense}', [ExpenseController::class, 'deleteExpense'])->name('expenses.destroy');
