<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// routes للمستخدمين العاديين
Route::get('/user/login', [AuthController::class, 'showUserLogin'])->name('user.login');
Route::post('/user/login', [AuthController::class, 'userLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/about', [UserController::class, 'about'])->name('about');
});

// routes للأدمن
Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users/store', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
});