<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('products/filter/category/{id}', [ProductController::class, 'filterByCategory'])->name('products.filter.category');
Route::get('products/filter/categories', [ProductController::class, 'filterByMultipleCategories'])->name('products.filter.multiple');
Route::get('products/search', [ProductController::class, 'searchByName'])->name('products.search');
