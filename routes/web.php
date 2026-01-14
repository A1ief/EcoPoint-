<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// // Dashboard Pages (protected by middleware)
// Route::middleware(['auth:sanctum'])->group(function () {
    
//     // User Dashboard
//     Route::get('/dashboard-user', function () {
//         return view('dashboard-user');
//     })->name('dashboard.user');
    
//     // Admin Dashboard
//     Route::get('/dashboard-admin', function () {
//         return view('dashboard-admin');
//     })->name('dashboard.admin');
    
//     // SuperAdmin Dashboard
//     Route::get('/dashboard-superadmin', function () {
//         return view('dashboard-superadmin');
//     })->name('dashboard.superadmin');
// });