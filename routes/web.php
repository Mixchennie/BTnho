<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';    

Route::get('/detail/{id}',[ProductController::class,'index'])->name('detail');
Route::get('/',[HomeController::class,'index'])->name('index');

// Route::get('/layout',function(){
//     return view('layout.master');
// });
Route::get('/product-type/{id}',[HomeController::class,'getProductType'])->name('getProductType');  
Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
Route::get('/list-cart', [HomeController::class, 'listCart']);
Route::get('/update-cart/{productId}', [HomeController::class, 'updateCart']);
Route::get('/checkout', [HomeController::class, 'checkout']);