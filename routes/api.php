<?php

use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PointController;
use App\Http\Controllers\API\SampahController;
use App\Http\Controllers\API\SuperadminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::post('/register', [AuthController::class, 'registerApi']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/login/{id}', [AuthController::class, 'loginApi']);
// Route::post('/admin/login', [AuthController::class, 'loginAdmin']);

// Protected routes - Semua authenticated users
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logoutApi']);
    Route::get('/profile', [AuthController::class, 'profile']);

    // User dapat melihat sampah mereka sendiri
    Route::get('sampah/my-sampah', [SampahController::class, 'getMySampah']);
    Route::get('poin/my-poin', [PointController::class, 'getMyPoin']);
    Route::get('poin/my-total', [PointController::class, 'getMyTotal']);

    // User dapat submit sampah
    Route::post('sampah', [SampahController::class, 'store']);
});

// Protected routes - Admin & SuperAdmin only
Route::middleware(['auth:sanctum', 'role:admin,superadmin'])->group(function () {
    // Manage all sampah
    Route::get('sampah', [SampahController::class, 'index']);
    Route::post('sampah', [SampahController::class, 'store']);
    Route::get('sampah/{id}', [SampahController::class, 'show']);
    Route::post('sampah/{id}', [SampahController::class, 'update']);
    Route::delete('sampah/{id}', [SampahController::class, 'destroy']);
    Route::get('sampah/user/{id_user}', [SampahController::class, 'getByUser']);

    // Manage poin
    // Poin routes
    Route::apiResource('point', PointController::class);
    Route::post('/point/{id}/approve', [PointController::class, 'approve']);
    Route::post('/point/{id}/reject', [PointController::class, 'reject']);
    Route::get('/point/statistics', [PointController::class, 'statistics']);

    // View users
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);

    // Toggle user status
    Route::patch('users/{id}/toggle-status', [AuthController::class, 'toggleStatus']);
});

// Protected routes - SuperAdmin only
Route::middleware(['auth:sanctum', 'role:superadmin'])->group(function () {
    // Create admin accounts
    Route::post('/register-admin', [AuthController::class, 'registerAdmin']);

    // Manage users
    Route::post('users', [UserController::class, 'store']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    // Change user roles
    Route::patch('users/{id}/change-role', [AuthController::class, 'changeRole']);

    // Superadmin management
    Route::apiResource('superadmin', SuperadminController::class);
});

// Get all users by role (admin & superadmin only)
Route::middleware(['auth:sanctum', 'role:admin,superadmin'])->group(function () {
    Route::get('users/role/user', function () {
        $users = \App\Models\User::onlyUsers()->get();
        return response()->json([
            'success' => true,
            'message' => 'Regular users retrieved successfully',
            'data' => $users
        ]);
    });

    Route::get('users/role/admin', function () {
        $users = \App\Models\User::onlyAdmins()->get();
        return response()->json([
            'success' => true,
            'message' => 'Admins retrieved successfully',
            'data' => $users
        ]);
    });

    Route::get('users/role/superadmin', function () {
        $users = \App\Models\User::onlySuperAdmins()->get();
        return response()->json([
            'success' => true,
            'message' => 'Superadmins retrieved successfully',
            'data' => $users
        ]);
    });
});
