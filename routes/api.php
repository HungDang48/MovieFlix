<?php

use App\Http\Controllers\API\APIAdminComtroller;
use App\Http\Controllers\API\APIDichVuController;
use App\Http\Controllers\API\APIDanhSachTaiKhoanController;
use App\Http\Controllers\API\APIDonViController;
use App\Http\Controllers\API\APIGheChieuController;
use App\Http\Controllers\API\APIHomepageController;
use App\Http\Controllers\API\APILichChieuController;
use App\Http\Controllers\API\APIPhimController;
use App\Http\Controllers\API\APIPhongChieuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/getID/film-detail', [APIHomepageController::class, 'getIdFilmDetail'])->name('getIdFilmDetail');

Route::group(['prefix'  =>  '/admin'], function() {
    Route::post('/create', [APIAdminComtroller::class, 'store'])->name('adminStore');
    Route::post('/data', [APIAdminComtroller::class, 'data'])->name('adminData');
    Route::post('/del', [APIAdminComtroller::class, 'destroy'])->name('adminDel');
    Route::post('/update', [APIAdminComtroller::class, 'update'])->name('adminUpdate');
    Route::post('/block', [APIAdminComtroller::class, 'block'])->name('taiKhoanAdminBlock');


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
        Route::post('/info', [APIGheChieuController::class, 'infoPhongGhe'])->name('infoPhongGhe');
        Route::post('/status', [APIGheChieuController::class, 'status'])->name('gheChieuStatus');
        Route::post('/update', [APIGheChieuController::class, 'update'])->name('gheChieuUpdate');
    });

    // Quản Lý Dịc Vụ
    Route::group(['prefix'  =>  '/dich-vu'], function() {
        Route::post('/create', [APIDichVuController::class, 'store'])->name('dichVuStore');
        Route::post('/data', [APIDichVuController::class, 'data'])->name('dichVuData');
        Route::post('/del', [APIDichVuController::class, 'destroy'])->name('dichVuDel');
        Route::post('/update', [APIDichVuController::class, 'update'])->name('dichVuUpdate');
        Route::post('/status', [APIDichVuController::class, 'status'])->name('dichVuStatus');
    });

    // Quản Lý Dịch Vụ
    Route::group(['prefix'  =>  '/don-vi'], function() {
        Route::post('/create', [APIDonViController::class, 'store'])->name('donViStore');
        Route::post('/data', [APIDonViController::class, 'data'])->name('donViData');
        Route::post('/del', [APIDonViController::class, 'destroy'])->name('donViDel');
        Route::post('/update', [APIDonViController::class, 'update'])->name('donViUpdate');
    });

    // Quản Lý Lịch Chiếu
    Route::group(['prefix'  =>  '/lich-chieu'], function() {
        Route::post('/create', [APILichChieuController::class, 'store'])->name('lichChieuStore');
        Route::post('/update', [APILichChieuController::class, 'update'])->name('lichChieuUpdate');
        Route::post('/delete', [APILichChieuController::class, 'destroy'])->name('lichChieuDelete');
        Route::post('/data', [APILichChieuController::class, 'data'])->name('lichChieuData');
        Route::post('/status', [APILichChieuController::class, 'status'])->name('lichChieuStatus');
        Route::post('/info', [APILichChieuController::class, 'info'])->name('lichChieuInfo');
    });
});
