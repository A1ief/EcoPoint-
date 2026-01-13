<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
=======
// routes/web.php

use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// LOGIN ROUTES
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // Simple authentication
    $email = request('email');
    $password = request('password');
    
    // Hardcoded credentials for demo
    if ($email === 'user@ecopoint.com' && $password === 'password') {
        // Set session
        session(['user_logged_in' => true, 'user_name' => 'User EcoPoint']);
        return redirect()->route('dashboard');
    }
    
    // If failed, back with error
    return back()->withErrors(['email' => 'Email atau password salah']);
})->name('login.post');

// DASHBOARD (protected)
Route::get('/dashboard', function () {
    // Check if user is logged in
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    
    return view('dashboard');
})->name('dashboard');

// LOGOUT
Route::post('/logout', function () {
    // Clear session
    session()->forget(['user_logged_in', 'user_name']);
    return redirect('/');
})->name('logout');

// routes/web.php
Route::get('/riwayat-transaksi', function () {
    // Check login
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    return view('riwayat-transaksi');
})->name('riwayat-transaksi');

Route::get('/penukaran-poin', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    return view('penukaran-poin');
})->name('penukaran-poin');


Route::get('/tukar-sampah', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    return view('tukar-sampah');
})->name('tukar-sampah');


Route::get('/profil', function () {
    if (!session('user_logged_in')) {
        return redirect()->route('login');
    }
    return view('profil');
})->name('profil');

>>>>>>> 44fc51f (push)
