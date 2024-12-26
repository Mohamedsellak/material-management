<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddlewar;
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
use App\Http\Controllers\LocalController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\CommandLineController;
use App\Http\Controllers\AffectationController;
// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Protected routes
Route::middleware(AuthMiddlewar::class)->group(function () {
    
    // Departements management
    Route::resource('departements', DepartementController::class);
    Route::resource('etats', EtatController::class);
    Route::resource('type-locals', TypeLocalController::class);
    Route::resource('type-materials', TypeMaterialController::class);
    Route::resource('fournisseurs', FournisseurController::class);
    Route::resource('fonctionaires', FonctionaireController::class);
    Route::resource('materials', MaterialController::class);
    Route::resource('entrees', EntreeController::class);
    Route::resource('locals', LocalController::class);
    Route::resource('commands', CommandController::class);
    Route::resource('command_lines', CommandLineController::class);
    Route::resource('affectations', AffectationController::class);
    Route::get('/casse', [AffectationController::class, 'casse'])->name('affectations.casse');
    
    // PDF generation routes
    Route::get('/affectations/{affectation}/pdf', [AffectationController::class, 'generatePDF'])->name('affectations.pdf');
    Route::get('/command_lines/{commandLine}/pdf', [CommandLineController::class, 'generatePDF'])->name('command_lines.pdf');

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit-email', [ProfileController::class, 'editEmail'])->name('profile.editEmail');
        Route::put('/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
        Route::get('/edit-password', [ProfileController::class, 'editPassword'])->name('profile.editPassword');
        Route::put('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });
    
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Fallback route for 404
Route::fallback(function () {
    return view('errors.404');
});
