<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Barang;

Route::get('/', function () {
    return view('welcome');
});

Route::get('route_cont/{id}', [Barang::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create'])->name("product-create")->middleware('auth', 'RoleCheck:admin');
Route::post('/product', [ProductController::class,'store'])->name("product-store")->middleware('auth', 'RoleCheck:admin');
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->middleware('auth', 'RoleCheck:admin');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth', 'RoleCheck:admin');
Route::delete('/product/{id}',[ProductController::class,'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
