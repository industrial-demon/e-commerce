<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\ProductContoller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return  view('welcome');
})->name('home');



Route::get('/admin/dashboard', function () {
    return view('admin.index');
});


// Route::get('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/1', [CategoryController::class, 'whereCondition']);
Route::get('/products', [ProductContoller::class, 'index']);

Route::prefix('products')->name('products.')->group(
    function () {
        Route::get('/published', [ProductContoller::class, 'publihedProducts'])->name('published');
        Route::get('/draft', [ProductContoller::class, 'draftProducts'])->name('draft');
        Route::delete('/{product}', [ProductContoller::class, 'destroy'])->name('destroy');
    }
);


Route::prefix('brands')->name('brands.')->group(
    function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/', [BrandController::class, 'store'])->name('store');
        Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('edit');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('update');
        Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('destroy');
    }
);

Route::get('/contact-us', function () {
    $product = 'PHONE';
    return view('contact-us', compact('product'));
});


Route::get('/about-us', function () {
    $product = 'PHONE';
    return view('about-us', compact('product'));
});


Route::get('invoke', InvokableController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('admin', 'admin.index')->name('admin.dashboard');
});


Route::fallback(function () {
    return '404 fallback';
});

require __DIR__ . '/settings.php';
