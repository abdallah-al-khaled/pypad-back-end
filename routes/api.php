<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('verify-email', [AuthController::class, 'verifyEmail']);

// Protected routes
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [AuthController::class, 'me']);

    // Admin routes
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::post('add', [AdminController::class, 'addAdmin']);
        Route::post('remove', [AdminController::class, 'removeAdmin']);
        Route::get('users', [AdminController::class, 'viewUsers']);
        Route::get('admins', [AdminController::class, 'viewAdmins']);
    });
});
