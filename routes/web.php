<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home');

Route::get('/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/create', [ProductController::class, 'store'])->name('products.store');

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/edit/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');