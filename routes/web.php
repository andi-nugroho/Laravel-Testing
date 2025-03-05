<?php

use App\Http\Livewire\Home;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\History;
use App\Http\Livewire\Keranjang;
use App\Http\Livewire\ProductLiga;
use App\Http\Livewire\ProductIndex;
use App\Http\Livewire\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', Home::class)->name('home');
Route::get('/products', ProductIndex::class)->name('products');
Route::get('/products/liga{ligaId}', ProductLiga::class)->name('products.liga');
Route::get('/products/{id}', ProductDetail::class)->name('products.detail');
Route::get('/keranjang', Keranjang::class)->name('keranjang');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/history', History::class)->name('history');
