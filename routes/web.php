<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth:web', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('admin.dashboard');
    Route::view('/orders', 'orders.index')->name('admin.orders');
    Route::view('/menu', 'menu.index')->name('admin.menu');
    Route::view('/categories', 'categories.index')->name('admin.categories');
    Route::view('/inventory', 'inventory.index')->name('admin.inventory');
    Route::view('/stock-movements', 'stock-movements.index')->name('admin.stock-movements');
    Route::view('/expenses', 'expenses.index')->name('admin.expenses');
    Route::view('/reports', 'reports.index')->name('admin.reports');
    Route::view('/analytics', 'analytics.index')->name('admin.analytics');
    // Rute admin lainnya tinggal dimasukkan di bawah sini
});

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
