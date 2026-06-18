<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\AIModelsController;
use App\Http\Controllers\MethodologyController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\Auth\EmailVerificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/ai-models', [AIModelsController::class, 'index'])->name('ai-models');
Route::get('/methodology', [MethodologyController::class, 'index'])->name('methodology');
Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');

/*
|--------------------------------------------------------------------------
| Custom Email Verification Routes (OTP) - MUST be before auth.php
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::post('/email/verify', [EmailVerificationController::class, 'verify'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'send'])->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Complete Profile Routes (After Email Verification)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/complete-profile', [ProfileController::class, 'complete'])->name('profile.complete');
    Route::post('/complete-profile', [ProfileController::class, 'storeComplete'])->name('profile.complete.store');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Requires Authentication & Email Verification)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Profile Page
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

    // Profile Edit Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/edit', [ProfileController::class, 'update'])->name('update');
        Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    });

    // Activity Log Routes
    Route::prefix('activity-log')->name('activity-log.')->group(function () {
        Route::get('/', [ActivityLogController::class, 'index'])->name('index');
        Route::get('/filter/{type}', [ActivityLogController::class, 'filter'])->name('filter');
        Route::get('/export', [ActivityLogController::class, 'export'])->name('export');
    });

    // Patient Cases Routes
    Route::prefix('cases')->name('cases.')->group(function () {
        Route::get('/', [CasesController::class, 'index'])->name('index');
        Route::get('/{id}', [CasesController::class, 'show'])->name('show');
        Route::get('/{id}/export', [CasesController::class, 'export'])->name('export');
        Route::post('/{id}/note', [CasesController::class, 'addNote'])->name('add-note');
        Route::post('/{id}/prediction', [CasesController::class, 'runPrediction'])->name('run-prediction');
        Route::get('/{id}/print', [CasesController::class, 'print'])->name('print');
    });
    // Prediction Routes
    Route::prefix('prediction')->name('prediction.')->group(function () {
        Route::get('/', [PredictionController::class, 'index'])->name('index');
        Route::get('/create', [PredictionController::class, 'create'])->name('create');
        Route::post('/', [PredictionController::class, 'store'])->name('store');
        Route::get('/{prediction}/results', [PredictionController::class, 'results'])->name('results');
        Route::get('/history', [PredictionController::class, 'history'])->name('history');
        Route::get('/{prediction}/export', [PredictionController::class, 'export'])->name('export');
        Route::delete('/{prediction}', [PredictionController::class, 'destroy'])->name('destroy');
        Route::post('/analyze', [PredictionController::class, 'predict'])->name('analyze');
        Route::post('/bulk-delete', [PredictionController::class, 'bulkDelete'])->name('bulk-delete');
        Route::get('/export-all', [PredictionController::class, 'exportAll'])->name('export-all');
    });
    /*
|--------------------------------------------------------------------------
| Admin Routes (Requires Authentication & Admin Role)
|--------------------------------------------------------------------------
*/
    Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cases', [App\Http\Controllers\Admin\CasesController::class, 'index'])->name('cases');
        Route::get('/cases/{id}', [App\Http\Controllers\Admin\CasesController::class, 'show'])->name('cases.show');
        Route::put('/cases/{id}', [App\Http\Controllers\Admin\CasesController::class, 'update'])->name('cases.update');
        Route::delete('/cases/{id}', [App\Http\Controllers\Admin\CasesController::class, 'destroy'])->name('cases.destroy');

        Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users');
        Route::get('/users/create', [App\Http\Controllers\Admin\UsersController::class, 'create'])->name('users.create');
        Route::post('/users', [App\Http\Controllers\Admin\UsersController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [App\Http\Controllers\Admin\UsersController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [App\Http\Controllers\Admin\UsersController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('users.destroy');

        Route::get('/reports', [App\Http\Controllers\Admin\ReportsController::class, 'index'])->name('reports');

        Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
        Route::post('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
    });

});