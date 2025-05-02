<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\DomainController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CloudflareController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin login/logout
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin routes - accessible only for authenticated admins
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Payment reports
    Route::get('/payments/total', [AdminController::class, 'totalPayments'])->name('payments.total');
    Route::get('/payments/users', [AdminController::class, 'paidUsers'])->name('payments.users');
    // Route::get('/payments/users/detail', [AdminController::class, 'paidUsersDetail'])->name('payments.user_detail');

    // Admin user management
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/toggle-status', [AdminUserController::class, 'toggleStatus'])->name('users.toggleStatus');

    // Laravel Resource Controller for services
    Route::resource('services', ServiceController::class);
    Route::patch('services/{id}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggleStatus');

    // General user resource controller
    Route::resource('users', UserController::class);
    Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');

    // Domain management
    Route::resource('domains', DomainController::class);
    Route::patch('domains/{domain}/toggle-status', [DomainController::class, 'toggleStatus'])->name('domains.toggleStatus');

    //Faq
    Route::resource('faqs', FaqController::class);
    Route::patch('faqs/{faq}/toggle-status', [FaqController::class, 'toggleStatus'])->name('faqs.toggleStatus');


});

// Cloudflare routes
Route::get('/cloudflare/analytics', [CloudflareController::class, 'fetchAnalytics']);
Route::get('/cloudflare/zones', [CloudflareController::class, 'fetchAnalytics']);
