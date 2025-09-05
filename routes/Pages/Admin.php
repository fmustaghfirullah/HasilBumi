<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Admin\PagesAdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

// Admin login routes
Route::get('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/login/proses', [AdminLoginController::class, 'authadmin'])->name('admin.auth');

// Admin logout route
Route::post('admin/logout', [AdminLogoutController::class, 'logout'])->name('admin.logout');


// Admin Dashboard
Route::get('Admin/Dashboard',[PagesAdminController::class , 'dashboard'])->name('admin.dashboard');

// Admin User Management
Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');

// Admin Product Management
Route::get('admin/products', [ProductController::class, 'index'])->name('admin.products.index');

// Admin Order Management
Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
