<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\TypeLocalController;
use App\Http\Controllers\TypeMaterialController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FonctionaireController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['customAuth'])->group(function () {
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

    // Fonctionaires management
    Route::resource('fonctionaires', FonctionaireController::class);

    // materials management
    Route::resource('materials', MaterialController::class);

    // // Entrees management
    Route::resource('entrees', EntreeController::class);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    // // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit-email', [ProfileController::class, 'editEmail'])->name('profile.editEmail');
    Route::put('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
    Route::get('/profile/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


});


// Fallback route for 404
Route::fallback(function () {
    return view('errors.404');
});
