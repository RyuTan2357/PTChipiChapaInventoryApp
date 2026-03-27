<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'RegisterPage'])->name('register.page');
Route::post('/register', [AuthController::class, 'Register'])->name('register');
Route::get('/login', [AuthController::class, 'LoginPage'])->name('login.page');
Route::post('/login', [AuthController::class, 'Login'])->name('login');
Route::post('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::middleware('checkAdminStatus')->group(function () {
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
});

Route::get('/', [ProductController::class, 'index'])->name('home');