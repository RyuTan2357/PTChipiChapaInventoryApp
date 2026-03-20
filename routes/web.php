<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/create', [ProductController::class, 'store']);
Route::get('/create', [ProductController::class, 'create']);
