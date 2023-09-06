<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\TrangChuController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\TestCollection;

Route::get('/create', [TestController::class, 'create']);
Route::get('/read', [TestController::class, 'read']);

// Route::get('/on-bai', [AdminController::class, 'onbai']);

Route::get('/', [TrangChuController::class, 'index']);

Route::get('/register', [CustomerController::class, 'viewRegister']);
Route::get('/login', [CustomerController::class, 'viewLogin']);
Route::get('/admin/login' , [AdminController::class , 'viewLogin']);
Route::get('/film-detail/{id}', [TrangChuController::class, 'detailPhim']);
Route::get('/forgot-password', [CustomerController::class, 'viewForgotPassword']);
Route::get('/change-password', [CustomerController::class, 'viewChangePassword']);


Route::get('/list-bill', [CustomerController::class, 'viewListBill']);


Route::group(['prefix'  =>  '/admin', 'middleware' => 'WebAdmin'], function() {
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
    Route::group(['prefix'  =>  '/lich-chieu'], function() {
        Route::get('/', [LichChieuController::class, 'index']);
    });
    Route::group(['prefix'  =>  '/quyen'], function() {
        Route::get('/', [QuyenController::class, 'indexQuyen']);
    });
    Route::group(['prefix'  =>  '/thong-ke'], function() {
        Route::get('/bt-1', [ThongKeController::class, 'bt1']);
        Route::get('/bt-2', [ThongKeController::class, 'bt2']);
        Route::get('/bt-3', [ThongKeController::class, 'bt3']);
        Route::get('/bt-4', [ThongKeController::class, 'bt4']);
        Route::get('/bt-5', [ThongKeController::class, 'bt5']);
    });
});
