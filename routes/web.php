<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\TestController;

// PUBLIC ROUTES
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// PROTECTED ROUTES (harus login)
Route::middleware(['auth'])->group(function () {
    // Dashboard - gunakan path yang berbeda
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    // User management
    Route::resource('users', UserController::class);
    Route::prefix('users')->group(function () {
    Route::get('{id}/edit-password', [UserController::class, 'editPassword'])->name('users.edit-password');
    Route::put('{id}/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');
    });
    
    // For superadmin only
    Route::middleware(['role:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

    });
});

// routes/web.php
Route::get('/test-api', [UserController::class, 'testConnection']);

Route::get('/rubbish', [TestController::class, 'rubbish'])->name('rubbish');
Route::get('/rubbishCreate', [TestController::class, 'rubbishCreate'])->name('rubbishCreate');
Route::get('/rubbishEdit', [TestController::class, 'rubbishEdit'])->name('rubbishEdit');
Route::get('/point', [TestController::class, 'point'])->name('point');
Route::get('/pointCreate', [TestController::class, 'pointCreate'])->name('pointCreate');