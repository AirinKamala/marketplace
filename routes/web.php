<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/')
Route::get('/login', function(){
    return view('/login');
});
Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', function (){
    return view('create', ['title' => 'Tambah Produk']);
})->name('product.create');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/', [ProductController::class, 'store'])->name('products.store');

Route::get('/product/edit/{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/edit/{id}', [ProductController::class, 'update'])->name('product.edited');

Route::get('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
