<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\PoinController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// --- USER ENDPOINTS
Route::get('/users', [UserController::class, 'index']);           // 1. Data user
Route::post('/users', [UserController::class, 'store']);          // 2. Tambah user baru
Route::get('/users/{id_user}', [UserController::class, 'show']);  // 3. Ambil detail user
Route::put('/users/{id_user}', [UserController::class, 'update']); // 4. Perbarui biodata user
Route::delete('/user/{id_user}', [UserController::class, 'destroy']); // 5. Hapus user
Route::post('/login/user', [UserController::class, 'login']);     // 6. Login user

// --- SAMPAH ENDPOINTS
Route::get('/sampah', [SampahController::class, 'index']);        // 7. Ambil semua data sampah
Route::post('/sampah', [SampahController::class, 'store']);       // 8. Tambah data sampah oleh user

// --- POIN ENDPOINTS
Route::get('/poin', [PoinController::class, 'index']);            // 9. Ambil data semua poin
Route::post('/poin', [PoinController::class, 'store']);           // 10. Tambah data poin (oleh admin)

// --- ADMIN ENDPOINTS 
Route::get('/admin', [AdminController::class, 'index']);          // 11. Ambil semua data admin
Route::post('/admin', [AdminController::class, 'store']);         // 12. Tambah admin baru (oleh superadmin)
Route::post('/login/admin', [AdminController::class, 'loginAdmin']); // 13. Login admin

// --- SUPERADMIN ENDPOINTS
Route::get('/superadmin', [AdminController::class, 'indexSuper']); // 14. Ambil semua data superadmin
Route::post('/login/superadmin', [AdminController::class, 'loginSuper']); // 15. Login superadmin