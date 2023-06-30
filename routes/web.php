<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrangChuController;
use App\Models\Phim;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrangChuController::class, 'index']);


Route::group(['prefix'  =>  '/admin'], function() {
    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::get('/', [PhimController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::get('/', [PhongChieuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
        Route::get('/', [DanhSachTaiKhoanController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/ghe-chieu'], function() {
        Route::get('/{id_phong}', [GheChieuController::class, 'index']);
    });
});
