<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\V1\AdminUserController;
use App\Http\Controllers\Api\V1\ContainerController;
use App\Http\Controllers\Api\V1\AccountController;
use App\Http\Controllers\Api\V1\ApplicationController;
use App\Http\Controllers\Api\V1\ApplicationContainerController;
use App\Http\Controllers\Api\V1\DomainController;
use App\Http\Controllers\Api\V1\FaqController;
use App\Http\Controllers\Api\v1\ServiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Burada bütün API route-lar qeyd olunur.
|--------------------------------------------------------------------------
*/

// 🔐 Auth - Login
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Authenticated routes (JWT protected)
Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // 🧭 Admin dashboard and user management
    Route::prefix('v1/admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::get('/users', [AdminUserController::class, 'index']);
        Route::get('/users/{user}', [AdminUserController::class, 'show']);
        Route::put('/users/{user}', [AdminUserController::class, 'update']);
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy']);
        Route::patch('/users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus']);
    });

    // 📦 Container
    Route::prefix('v1/Container')->group(function () {
        Route::get('/type', [ContainerController::class, 'getTypes']);
        Route::get('/', [ContainerController::class, 'index']);
        Route::get('/{id}', [ContainerController::class, 'show']);
        Route::get('/{id}/log', [ContainerController::class, 'log']);
        Route::post('/operation/{id}', [ContainerController::class, 'operateSingle']);
        Route::post('/operation', [ContainerController::class, 'operateBulk']);
        Route::get('/active', [ContainerController::class, 'getActive']);
    });

    // 🚀 Applications
    Route::get('/v1/Application', [ApplicationController::class, 'index']);

    // 📦 Application Container
    Route::prefix('v1/application-container')->group(function () {
        Route::get('/type', [ApplicationContainerController::class, 'getTypes']);
        Route::get('/', [ApplicationContainerController::class, 'index']);
        Route::get('/{id}', [ApplicationContainerController::class, 'show']);
        Route::get('/{id}/activity', [ApplicationContainerController::class, 'activity']);
        Route::get('/{id}/dependency', [ApplicationContainerController::class, 'dependency']);
        Route::get('/{id}/dependency/components', [ApplicationContainerController::class, 'dependencyComponents']);
        Route::get('/{id}/dependency/vulnerabilities', [ApplicationContainerController::class, 'dependencyVulnerabilities']);
        Route::get('/{id}/dependency/violations', [ApplicationContainerController::class, 'dependencyViolations']);
        Route::get('/{id}/log', [ApplicationContainerController::class, 'log']);
        Route::post('/operation/{id}', [ApplicationContainerController::class, 'operateSingle']);
        Route::post('/operation', [ApplicationContainerController::class, 'operateBulk']);
    });

    // 👤 Account
    Route::prefix('v1/Account')->group(function () {
        Route::get('/check', [AccountController::class, 'checkEmail']);
        Route::get('/activity', [AccountController::class, 'activity']);
        Route::get('/using', [AccountController::class, 'usingList']);
        Route::get('/', [AccountController::class, 'info']);
        Route::post('/{local}', [AccountController::class, 'register']);
        Route::post('/login', [AccountController::class, 'login']);
        Route::post('/cli-login', [AccountController::class, 'cliLogin']);
        Route::post('/logout', [AccountController::class, 'logout']);
        Route::get('/forgot-password/{local}', [AccountController::class, 'forgotPassword']);
        Route::put('/{id}/reset-password', [AccountController::class, 'resetPassword']);
        Route::post('/verification-mail/{local}', [AccountController::class, 'sendVerificationMail']);
        Route::get('/verify-email', [AccountController::class, 'verifyEmail']);
        Route::put('/password', [AccountController::class, 'changePassword']);
        Route::put('/personal-info', [AccountController::class, 'updatePersonalInfo']);
        Route::put('/picture', [AccountController::class, 'updatePicture']);
        Route::put('/deactivate', [AccountController::class, 'deactivate']);
    });


    Route::prefix('v1/domains')->group(function () {
        Route::get('/', [DomainController::class, 'index']);
        Route::post('/', [DomainController::class, 'store']);
        Route::put('/{id}', [DomainController::class, 'update']);
        Route::delete('/{id}', [DomainController::class, 'destroy']);
        Route::patch('/{id}/toggle-status', [DomainController::class, 'toggleStatus']);
    });


    Route::prefix('v1/faq')->group(function () {
        Route::get('/', [FaqController::class, 'index']);
        Route::post('/', [FaqController::class, 'store']);
        Route::put('/{id}', [FaqController::class, 'update']);
        Route::delete('/{id}', [FaqController::class, 'destroy']);
        Route::patch('/{id}/toggle-status', [FaqController::class, 'toggleStatus']);
    });
    Route::prefix('v1/services')->group(function () {
        Route::get('/', [ServiceController::class, 'index']);
    });


});
