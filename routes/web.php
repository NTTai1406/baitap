<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// hiển thị trang login
Route::get('/login', [UserController::class, 'showLogin'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');

// hiển thị sản phẩm cho người dùng (Guest)
Route::get('/viewProducts', [ProductController::class, 'viewProducts'])->name('products.view');
// Tìm kiếm sản phẩm
Route::get('/searchProduct', [ProductController::class, 'searchProduct'])->name('products.search');

// dành cho admin để quản lý sản phẩm
Route::middleware('CheckLogin')->group(function () {
    Route::get('/adminProducts', [ProductController::class, 'adminProducts'])->name('admin.products');
    Route::get('/editProducts/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/updateProducts/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/deleteProducts/{id}', [ProductController::class, 'delete'])->name('admin.products.delete');
    Route::get('/addProducts', [ProductController::class, 'add'])->name('admin.products.add');
    Route::post('/storeProducts', [ProductController::class, 'store'])->name('admin.products.store');
});

// logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
