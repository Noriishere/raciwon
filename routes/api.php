<?php

use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\MenuController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::prefix('auth')->group(function () {

        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/refresh', [AuthController::class, 'refresh']);

    });

    Route::middleware('auth:customer')->group(function () {

        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);

    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('/{category}', [CategoryController::class, 'show']);
    });

    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index']);
        Route::get('/{menu}', [MenuController::class, 'show']);
    });
    
    
    Route::prefix('orders')->group(function () {
        Route::get('/',[OrderController::class, 'index']);
        Route::post('/',[OrderController::class, 'store']);
        Route::get('/{order}',[OrderController::class, 'show']);
        Route::get('/my-orders',[OrderController::class, 'myOrders']);
        Route::patch('/{order}/complete',[OrderController::class, 'complete']);
    });
});

Route::get('/admin/recipe/{menu}',[RecipeController::class, 'show'])->name('admin.recipe.show');