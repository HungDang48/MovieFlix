<?php

use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrangChuController;
use App\Models\Phim;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrangChuController::class, 'index']);
Route::get('/film-detail/{id}', [TrangChuController::class, 'detailPhim']);


Route::group(['prefix'  =>  '/admin'], function() {
    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::get('/', [PhimController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::get('/', [PhongChieuController::class, 'index']);
    });
});
