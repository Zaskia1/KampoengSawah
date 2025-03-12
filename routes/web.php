<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WaiterController;

// Halaman utama hanya bisa diakses jika sudah login
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');


// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/menu', [MenuController::class, 'index'])->name('order.menu');
    Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');
// Menu Routes (hanya bisa diakses jika sudah login)
Route::middleware(['auth'])->group(function () {


    // Order Routes
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show');

    // Waiter Routes
    Route::get('/waiter', [WaiterController::class, 'index'])->name('waiter.index');
    Route::post('/waiter/update/{id}', [WaiterController::class, 'update'])->name('waiter.update');
});

// Views
Route::view('/auth/login', 'auth.login')->middleware('guest');
