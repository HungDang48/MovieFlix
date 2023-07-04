<?php

use App\Http\Controllers\API\APIDichVuController;
use App\Http\Controllers\APIDanhSachTaiKhoanController;
use App\Http\Controllers\APIGheChieuController;
use App\Http\Controllers\API\APIPhimController;
use App\Http\Controllers\API\APIPhongChieuController;
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

    Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
        Route::post('/create', [APIDanhSachTaiKhoanController::class, 'store'])->name('taiKhoanStore');
        Route::post('/data', [APIDanhSachTaiKhoanController::class, 'data'])->name('taiKhoanData');
        Route::post('/status', [APIDanhSachTaiKhoanController::class, 'status'])->name('taiKhoanStatus');
        Route::post('/block', [APIDanhSachTaiKhoanController::class, 'block'])->name('taiKhoanBlock');
        Route::post('/info', [APIDanhSachTaiKhoanController::class, 'info'])->name('taiKhoanInfo');
        Route::post('/del', [APIDanhSachTaiKhoanController::class, 'destroy'])->name('taiKhoanDel');
        Route::post('/update', [APIDanhSachTaiKhoanController::class, 'update'])->name('taiKhoanUpdate');
    });

    // Quản Lý Ghế Chiếu
    Route::group(['prefix'  =>  '/ghe-chieu'], function() {
        Route::post('/create', [APIGheChieuController::class, 'store'])->name('gheChieuStore');
    });

    // Quản Lý Dịc Vụ
    Route::group(['prefix'  =>  '/dich-vu'], function() {
        Route::post('/create', [APIDichVuController::class, 'store'])->name('dichVuStore');
        Route::post('/data', [APIDichVuController::class, 'data'])->name('dichVuData');
    });
});
