<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/contact', [ContactController::class, 'index'])->name('contactus');



use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUsersController;

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');
    });


    /*
    |--------------------------------------------------------------------------
    | Profile (Admin + Super Admin)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['admin_role'])->group(function () {
        Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    });


    /*
    |--------------------------------------------------------------------------
    | Super Admin Only — Manage Admins/Super Admins
    |--------------------------------------------------------------------------
    */
    Route::middleware(['super_admin'])->group(function () {
        Route::resource('/admin/dashboard/users', AdminUsersController::class);
    });
});


require __DIR__ . '/auth.php';
