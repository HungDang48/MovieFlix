<?php

use App\Http\Controllers\APIPhimController;
use App\Http\Controllers\APIPhongChieuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'  =>  '/admin'], function() {
    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::post('/create', [APIPhimController::class, 'store'])->name('phimStore');
        Route::post('/data', [APIPhimController::class, 'data'])->name('phimData');
        Route::post('/status', [APIPhimController::class, 'status'])->name('phimStatus');
        Route::post('/info', [APIPhimController::class, 'info'])->name('phimInfo');
        Route::post('/del', [APIPhimController::class, 'destroy'])->name('phimDel');
        Route::post('/update', [APIPhimController::class, 'update'])->name('phimUpdate');

    });

    // Quản Lý Phòng Chiếu
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::post('/create', [APIPhongChieuController::class, 'store'])->name('phongChieuStore');
        Route::post('/data', [APIPhongChieuController::class, 'data'])->name('phongChieuData');
        Route::post('/status', [APIPhongChieuController::class, 'status'])->name('phongStatus');
        Route::post('/info', [APIPhongChieuController::class, 'info'])->name('phongInfo');
        Route::post('/del', [APIPhongChieuController::class, 'destroy'])->name('phongDel');
        Route::post('/update', [APIPhongChieuController::class, 'update'])->name('phongUpdate');
    });
});
