<?php

use App\Http\Controllers\admin\kategoriController;
use App\Http\Controllers\admin\produkController as adminProdukController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\admin\settingController;
use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


// ADMIN PANEL
Route::prefix('admin')->group(function () {
    // OVERVIEW
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    // KATEGORI
    Route::prefix('kategori')->group(function () {
        Route::get('/', [kategoriController::class, 'index'])->name('admin.kategori.index');
        Route::post('/', [kategoriController::class, 'store'])->name('admin.kategori.store');
        Route::put('/{kategori}', [kategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/{kategori}', [kategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });
    // PRODUK
    Route::prefix('produk')->group(function () {
        Route::get('/', [adminProdukController::class, 'index'])->name('admin.produk.index');
        Route::get('/form', [adminProdukController::class, 'create'])->name('admin.produk.form');
        Route::post('/store', [adminProdukController::class, 'store'])->name('admin.produk.store');
        Route::get('/{produk}/edit', [adminProdukController::class, 'edit'])->name('admin.produk.edit');
        Route::put('/{produk}/update', [adminProdukController::class, 'update'])->name('admin.produk.update');
        Route::delete('/{produk}/destroy', [adminProdukController::class, 'destroy'])->name('admin.produk.destroy');
    });
    // SETTING
    Route::prefix('settings')->group(function () {
        Route::get('/', [settingController::class, 'index'])->name('admin.settings');
        Route::post('/update', [settingController::class, 'update'])->name('admin.settings.update');
    });
});

// GUEST
Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/about', [HomepageController::class, 'about'])->name('about');
Route::prefix('produk')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/{produk}', [ProdukController::class, 'show'])->name('produk.show');
});
