<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\StoreController::class, 'index'])->name('home_page');

Route::middleware(['editor'])->group(function () {
    Route::get('/editor/dashboard', [\App\Http\Controllers\Editor\EditorController::class, 'index'])->name('editor_dashboard');
});

Route::middleware(['admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
});

Auth::routes();

