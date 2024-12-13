<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\TypeLocalController;
use App\Http\Controllers\TypeMaterialController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\DepartementController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
// Route::middleware(['auth'])->group(function () {
    // Departements management
    Route::resource('departements', DepartementController::class);
    
    // Etats (States) management
    Route::resource('etats', EtatController::class);
    
    // Type Locals management
    Route::resource('type-locals', TypeLocalController::class);
    
    // Type Materials management
    Route::resource('type-materials', TypeMaterialController::class);
    
    // Fournisseurs (Suppliers) management
    Route::resource('fournisseurs', FournisseurController::class);
// });

// Fallback route for 404
Route::fallback(function () {
    return view('errors.404');
});
