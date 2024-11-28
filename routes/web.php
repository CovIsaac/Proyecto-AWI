<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaborController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;

Route::get('/sobre-nosotros', function () {
    return view('sobre-nosotros');
})->name('sobre-nosotros');


Route::get('/sabores', [SaborController::class, 'index'])->name('sabores');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/carrito', [CartController::class, 'index'])->name('carrito');
    Route::post('/add-to-cart/{mezcal}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::patch('/update-cart/{cart}', [CartController::class, 'updateCart'])->name('update-cart');
    Route::delete('/remove-from-cart/{cart}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');
    Route::get('/pago', [CartController::class, 'showPaymentPage'])->name('pago'); 
    Route::post('/procesar-pago', [CartController::class, 'procesarPago'])->name('procesar-pago');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
