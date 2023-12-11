<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProposalController;
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
Route::middleware(['role:admin'])->group(function () {
    // Routes accessibles uniquement par les utilisateurs ayant le rôle "admin"
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/listing/create', [ListingController::class ,'create'])->middleware('auth');
Route::get('/listing/manage', [ListingController::class ,'manage'])->middleware('auth');
Route::post('/listing', [ListingController::class ,'store'])->middleware('auth');
Route::put('/listing/{id}', [ListingController::class ,'update'])->middleware('auth');
Route::delete('/listing/{id}', [ListingController::class ,'delete'])->middleware('auth');
Route::get('/listing/{id}/edit', [ListingController::class ,'edit'])->middleware('auth');
});


Route::middleware(['role:user'])->group(function () {
    // Routes accessibles uniquement par les utilisateurs ayant le rôle "user"
    Route::post('/proposal/{listing_id}', [ProposalController::class ,'submit'])->middleware('auth');
    Route::get('/proposal/manage', [ProposalController::class, 'manage']);
Route::get('/proposal/{listing_id}', [ProposalController::class ,'create'])->middleware('auth');
Route::get('/proposal/{id}/edit', [ProposalController::class ,'edit'])->middleware('auth');
Route::put('/proposal/{id}/edit', [ProposalController::class ,'update'])->middleware('auth');
Route::delete('/proposal/{id}', [ProposalController::class ,'delete'])->middleware('auth');
   
});

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect('/listing/manage');
    } else {
        // Redirection normale ou action pour les utilisateurs non-admin
        // Par exemple, rediriger vers la page d'accueil principale
        return redirect('/listings');
    }
});
Route::get('/listings', [ListingController::class ,'index']);
Route::get('/register', [UserController::class ,'register'])->middleware('guest');
Route::post('/register', [UserController::class ,'create']);
Route::get('/login', [UserController::class ,'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class ,'signin']);
Route::post('/logout', [UserController::class ,'logout'])->middleware('auth');
Route::get('/listing/{id}', [ListingController::class ,'show']);
// routes/web.php




