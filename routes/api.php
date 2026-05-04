<?php

use App\Http\Controllers\Api\AuthController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use Symfony\Component\Routing\Router;

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('product', ProductController::class);
Route::get('/api/product', [ProductController::class, 'index']);
Route::get('/api/product/{id}', [ProductController::class, 'show']);
Route::post('/api/product', [ProductController::class, 'store']);
Route::put('api/product/{id}', [ProductController::class, 'update']);
Route::delete('/api/product/{id}', [ProductController::class, 'destroy']);
Route::get('/api/product/category/{category}',[ProductController::class,'showCategory']);
