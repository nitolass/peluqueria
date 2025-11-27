<?php

use App\Admin\Users\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard general
Route::get('/dashboard', function () {
    $appointments = auth()->user()->appointments()->with('service')->get();
    return view('dashboard', compact('appointments'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de usuarios
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
    });

    // Rutas de productos
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    });

    // Rutas de appointments
    Route::prefix('appointments')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('appointments.store');
    });

});

require __DIR__.'/auth.php';
