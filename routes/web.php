<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\MobilController;

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

Route::get('/welcome', function () {
    return view('welcome');
  });

  Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'DONE';
  });

  Auth::routes();

  Route::middleware(['auth'])->group(function () {
    Route::middleware(['role'])->group(function () {
      Route::resource('/merek', MerekController::class);
      Route::resource('/order', OrderController::class);
      Route::get('/order/tampil_cancel', [App\Http\Controllers\OrderController::class, 'tampil_cancel'])->name('order.tampil_cancel');
      Route::get('/order/tampil_bayar', [App\Http\Controllers\OrderController::class, 'tampil_bayar'])->name('order.tampil_bayar');
      Route::get('/order/tampil_pending', [App\Http\Controllers\OrderController::class, 'tampil_pending'])->name('order.tampil_pending');
      Route::resource('/akun', AkunController::class);
      Route::resource('/mobil', MobilController::class);
      Route::get('/create/mobil', [App\Http\Controllers\MobilController::class, 'create'])->name('create.mobil');
      Route::get('/mobil/tampil_hapus', [App\Http\Controllers\MobilController::class, 'tampil_hapus'])->name('mobil.tampil_hapus');
      Route::get('/mobil/restore/{id}', [App\Http\Controllers\MobilController::class, 'restore'])->name('mobil.restore');
      Route::delete('/mobil/kill/{id}', [App\Http\Controllers\MobilController::class, 'kill'])->name('mobil.kill');
    });

    Route::get('/', [App\Http\Controllers\MobilController::class, 'home'])->name('home');
    Route::get('/home', [App\Http\Controllers\MobilController::class, 'home'])->name('home');
    Route::get('/favorite', [App\Http\Controllers\MobilController::class, 'favorite'])->name('favorite');
    Route::get('/like/{id}', [App\Http\Controllers\MobilController::class, 'like'])->name('like');
    Route::get('/unlike/{id}', [App\Http\Controllers\MobilController::class, 'unlike'])->name('unlike');
    Route::get('/cart', [App\Http\Controllers\MobilController::class, 'cart'])->name('cart');
    Route::get('/add-to-cart/{id}', [App\Http\Controllers\MobilController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/mobil/{id}', [App\Http\Controllers\MobilController::class, 'show'])->name('mobil.show');
    Route::get('/profil/{id}', [App\Http\Controllers\AkunController::class, 'profil'])->name('profil');
    Route::get('/edit_profil/{id}', [App\Http\Controllers\AkunController::class, 'edit_profil'])->name('edit_profil');
    Route::post('/akun/simpan/{id}', [App\Http\Controllers\AkunController::class, 'simpan'])->name('akun.simpan');
    Route::patch('/update_cart', [App\Http\Controllers\MobilController::class, 'update_cart'])->name('update_cart');
    Route::delete('/remove', [App\Http\Controllers\MobilController::class, 'remove'])->name('remove');
    Route::delete('/order/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy');
    Route::get('/cekout', [App\Http\Controllers\MobilController::class, 'cekout'])->name('cekout');
    Route::get('/category/{id}', [App\Http\Controllers\MobilController::class, 'category'])->name('category');
    Route::get('/history', [App\Http\Controllers\OrderController::class, 'history'])->name('history');
    Route::get('/pembayaran/success', [App\Http\Controllers\OrderController::class, 'success'])->name('pembayaran.success');
    Route::get('/pembayaran/{id}', [App\Http\Controllers\OrderController::class, 'pembayaran'])->name('pembayaran');
    Route::patch('/proses_pembayaran/{id}', [App\Http\Controllers\OrderController::class, 'proses_pembayaran'])->name('proses_pembayaran');
    Route::post('/proses_cekout/{id}', [App\Http\Controllers\MobilController::class, 'proses_cekout'])->name('proses_cekout');
  });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
