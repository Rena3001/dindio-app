<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ContainerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php


Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);

// Route::get('admin/stats', [AdminController::class, 'getDashboardStats']);
Route::get('/v1/Container/type', [ContainerController::class, 'getTypes']);

// Route::prefix('v1/Account')->group(function () {
//     Route::post('/login', [AuthController::class, 'login']);
// });