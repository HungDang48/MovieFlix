<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TrangChuController;
use App\Models\Phim;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrangChuController::class, 'index']);
Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::get('/admin/login' , [AdminController::class , 'viewLogin']);
Route::get('/film-detail/{id}', [TrangChuController::class, 'detailPhim']);

Route::group(['prefix'  =>  '/admin'], function() {
    Route::get('/', [AdminController::class, 'index']);
    // Quản Lý Phim
    Route::group(['prefix'  =>  '/phim'], function() {
        Route::get('/', [PhimController::class, 'index']);
        Route::get('/vue', [PhimController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/phong-chieu'], function() {
        Route::get('/', [PhongChieuController::class, 'index']);
        Route::get('/vue', [PhongChieuController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function() {
        Route::get('/', [DanhSachTaiKhoanController::class, 'index']);
        Route::get('/vue', [DanhSachTaiKhoanController::class, 'indexVue']);
    });
    Route::group(['prefix'  =>  '/ghe-chieu'], function() {
        Route::get('/{id_phong}', [GheChieuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/dich-vu'], function() {
        Route::get('/', [DichVuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/don-vi'], function() {
        Route::get('/', [DonViController::class, 'index']);
    });
});
