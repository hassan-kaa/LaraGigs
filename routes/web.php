<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class ,'index']);
Route::get('/listing/create', [ListingController::class ,'create'])->middleware('auth');
Route::post('/listing', [ListingController::class ,'store'])->middleware('auth');
Route::put('/listing/{id}', [ListingController::class ,'update'])->middleware('auth');
Route::delete('/listing/{id}', [ListingController::class ,'delete'])->middleware('auth');
Route::get('/listing/{id}/edit', [ListingController::class ,'edit'])->middleware('auth');
Route::get('/listing/{id}', [ListingController::class ,'show']);
Route::get('/register', [UserController::class ,'register'])->middleware('guest');
Route::post('/register', [UserController::class ,'create']);
Route::get('/login', [UserController::class ,'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class ,'signin']);
Route::post('/logout', [UserController::class ,'logout'])->middleware('auth');

