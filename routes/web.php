<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AuthMiddlewar;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\FonctionnaireMiddleware;

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
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\FonctionnaireReclamationController;
use App\Http\Controllers\CasseController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Protected routes
Route::middleware(AuthMiddlewar::class)->group(function () {

    Route::middleware(AdminMiddleware::class)->group(function () {
        // management
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

        // Affectations routes
        Route::resource('affectations', AffectationController::class);
        Route::post('affectations/reaffecter', [AffectationController::class, 'reaffecterStore'])->name('affectations.reaffecterStore');
        Route::get('affectations/{affectation}/reaffecter', [AffectationController::class, 'reaffecter'])->name('affectations.reaffecter');

        // Users routes
        Route::resource('users', UserController::class);

        // Reclamations routes
        Route::resource('reclamations', ReclamationController::class);
        Route::get('reclamations/{reclamation}/editStatus', [ReclamationController::class, 'editStatus'])->name('reclamations.editStatus');
        Route::put('reclamations/{reclamation}/updateStatus', [ReclamationController::class, 'updateStatus'])->name('reclamations.updateStatus');


        // Casse routes
        Route::get('/casse', [CasseController::class, 'index'])->name('casse.index');

        // PDF generation routes
        Route::get('/affectations/{affectation}/pdf', [AffectationController::class, 'generatePDF'])->name('affectations.pdf');
        Route::get('/command_lines/{commandLine}/pdf', [CommandLineController::class, 'generatePDF'])->name('command_lines.pdf');
        Route::get('/commands/{command}/pdf', [CommandController::class, 'generatePDF'])->name('commands.pdf');
        Route::get('/casse/{affectation}/pdf', [CasseController::class, 'cassePdf'])->name('casse.pdf');

        // Dashboard routes
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    });

    Route::middleware(FonctionnaireMiddleware::class)->group(function () {
        Route::resource('fonctionnaire-reclamations', FonctionnaireReclamationController::class);
    });

    // API routes
    Route::get('/api/departments/{departmentId}/locals', [LocalController::class, 'getByDepartment'])->name('api.locals.by-department');
    Route::get('/api/type-materials/{typeMaterialId}/materials', [TypeMaterialController::class, 'getByTypeMaterial'])->name('api.materials.by-type-material');

    // for all authenticated users
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
