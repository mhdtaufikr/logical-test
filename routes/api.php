<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;

Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/detail', [ProductController::class, 'index_detail']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::get('products/detail/{id}', [ProductController::class, 'show_detail']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::put('update/detail/{product}',  [ProductController::class, 'update_detail']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
    Route::post('create_detail/{product}', [ProductController::class, 'store_detail']);
    Route::delete('delete/detail/{product}',  [ProductController::class, 'destroy_detail']);
    
});