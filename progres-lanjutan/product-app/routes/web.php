<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('/product', [ProductController::class, 'index'])->name('product-list');

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/create', [ProductController::class, 'create'])->name("product-create")->middleware('auth', 'RoleCheck:admin');
Route::post('/product', [ProductController::class,'store'])->name("product-store")->middleware('auth', 'RoleCheck:admin');
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit')->middleware('auth', 'RoleCheck:admin');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update')->middleware('auth', 'RoleCheck:admin');
Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product-delete')->middleware('auth', 'RoleCheck:admin');
Route::get('/product/export/excel',[ProductController::class, 'exportExcel'])->name('product-export-excel')->middleware('auth', 'RoleCheck:admin');

Route::get('route_cont/{id}', [BarangController::class, 'index']);

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier-list');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name("supplier-create")->middleware('auth', 'RoleCheck:admin');
Route::post('/supplier', [SupplierController::class,'store'])->name("supplier-store")->middleware('auth', 'RoleCheck:admin');
