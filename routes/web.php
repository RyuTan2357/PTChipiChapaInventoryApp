<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::post('/create', [ProductController::class, 'store'])->name('products.store');
Route::get('/create', [ProductController::class, 'create'])->name('products.create');
