<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SampahPoinController;
use App\Http\Controllers\Api\AdminController;
use Illuminate\Support\Facades\Route;
//user
Route::get('/user', [UserController::class, 'index']);           
Route::post('/user', [UserController::class, 'store']);          
Route::get('/user/{id}', [UserController::class, 'show']);       
Route::put('/user/{id}', [UserController::class, 'update']);     
Route::delete('/user/{id}', [UserController::class, 'destroy']); 
Route::post('/login/user', [UserController::class, 'loginUser']);
//sampah
Route::get('/sampah', [SampahPoinController::class, 'getSampah']);    
Route::post('/sampah', [SampahPoinController::class, 'storeSampah']); 
//poin
Route::get('/poin', [SampahPoinController::class, 'getPoin']);        
Route::post('/poin', [SampahPoinController::class, 'storePoin']);     
//admin
Route::get('/admin', [AdminController::class, 'indexAdmin']);
Route::post('/admin', [AdminController::class, 'storeAdmin']);
Route::post('/login/admin', [AdminController::class, 'loginAdmin']);
//superadmin
Route::get('/superadmin', [AdminController::class, 'indexSuperadmin']);
Route::post('/login/superadmin', [AdminController::class, 'loginSuperadmin']);
