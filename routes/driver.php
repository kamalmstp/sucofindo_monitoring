<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Driver\PengirimanController;
use App\Http\Controllers\Driver\BahanBakarController;

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::prefix('driver')
    ->middleware('role:' . User::DRIVER)
    ->name('driver.')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::resource('pengiriman', PengirimanController::class);
        Route::resource('bahanbakar', BahanBakarController::class);

    });
