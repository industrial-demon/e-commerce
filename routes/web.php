<?php

use App\Http\Controllers\InvokableController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return  view('welcome');
});



Route::get('/admin/dashboard', function(){

    return view('admin.index');
});


Route::get('/products', function () {
    $test = null;
    return view('products.index')->with('name', 'phone 444',)->with(
        'price',
        3333
    );
});

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


Route::fallback(function () {
    return '404 fallback';
});

require __DIR__ . '/settings.php';
