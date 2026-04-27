<?php

use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('produk.index');
});

Route::resource('produk', ProdukController::class);

