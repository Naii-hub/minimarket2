<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);
});

// Admin + Kasir routes
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::get('/transactions/create', [TransactionController::class, 'create'])
        ->name('transactions.create');

    Route::post('/transactions', [TransactionController::class, 'store'])
        ->name('transactions.store');
});

// Kasir routes
Route::middleware(['auth', 'role:kasir'])->group(function () {

    Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])
        ->name('kasir.dashboard');
});

require __DIR__.'/auth.php';