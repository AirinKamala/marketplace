<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('product', ProductController::class);
Route::get('/api/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/api/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/api/product', [ProductController::class, 'store'])->name('products.store');
Route::put('api/product/{id}', [ProductController::class, 'update'])->name('product.edit');
Route::delete('/api/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
