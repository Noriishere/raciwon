<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RecipeController;
use App\Http\Controllers\Admin\StockMovementController;
use App\Http\Controllers\Cashier\CashierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth:web', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('admin.dashboard');
    Route::view('/orders', 'orders.index')->name('admin.orders');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::resource('menu', MenuController::class)->names('admin.menu');
    Route::post('/inventory/movement', [InventoryController::class, 'storeMovement'])->name('admin.inventory.movement.store');
    Route::resource('inventory', InventoryController::class)->names('admin.inventory');
    Route::view('/stock-movements', 'stock-movements.index')->name('admin.stock-movements');
    Route::view('/expenses', 'expenses.index')->name('admin.expenses');
    Route::view('/reports', 'reports.index')->name('admin.reports');
    Route::view('/analytics', 'analytics.index')->name('admin.analytics');
    Route::view('/users', 'users.index')->name('admin.users');

    Route::post('/recipe',[RecipeController::class, 'store'])->name('admin.recipe.store');
    Route::get('/stock-movements',[StockMovementController::class, 'index'])->name('admin.stock-movements.index');
    Route::get('/recipe/{menu}',[RecipeController::class, 'show'])->name('admin.recipe.show');
    // Rute admin lainnya tinggal dimasukkan di bawah sini
});

Route::prefix('cashier')->middleware(['auth:web'])->group(function() {
    Route::get('/dashboard',[CashierController::class, 'index'])->name('cashier.index');
    Route::get('/orders/pending',[CashierController::class, 'pendingOrders']);
    Route::post('/orders/{order}/payment',[CashierController::class, 'payment']);
    Route::get('/orders/processing',[CashierController::class, 'processingOrders']);
});

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
