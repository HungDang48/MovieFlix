<?php

namespace App\Http\Controllers\API;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class APIDanhSachTaiKhoanController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            $data   = $request->all();

            DanhSachTaiKhoan::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phim thành công!'
            ]);
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            if($danhSachTaiKhoan) {
                $data   = $request->all();
                $danhSachTaiKhoan->update($data);
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa phim thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Phim không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function data()
    {
        $data   = DanhSachTaiKhoan::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if($danhSachTaiKhoan) {
                if($danhSachTaiKhoan->tinh_trang == 1) {
                    $danhSachTaiKhoan->tinh_trang = 0;
                } else {
                    $danhSachTaiKhoan->tinh_trang = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function block(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if($danhSachTaiKhoan) {
                if($danhSachTaiKhoan->is_block == 1) {
                    $danhSachTaiKhoan->is_block = 0;
                } else {
                    $danhSachTaiKhoan->is_block = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function info(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            if($danhSachTaiKhoan) {
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'data'      => $danhSachTaiKhoan
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);

            if($danhSachTaiKhoan) {
                $danhSachTaiKhoan->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa tài khoản thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function register(Request $request)
    {
        $data               = $request->all();
        $data['is_block']   =   0;
        $data['tinh_trang'] =   0;
        $data['password']   = bcrypt($request->password);  // Gốc 123456 -> Lưu: e10adc3949ba59abbe56e057f20f883e

        DanhSachTaiKhoan::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới tài khoản thành công!',
        ]);
    }

    public function login(Request $request)
    {
        $check      =   DanhSachTaiKhoan::where('email', $request->email)
                                        // ->where('password', $request->password)
                                        ->first();
        $mk_luu     =   $check->password;
        $mk_nhap    =   $request->password;

        if($check && password_verify($mk_nhap, $mk_luu))  {
            // Ở đây nghĩa là ta check email và password nó giống ở database
            // Ta cần tạo 1 biến auth và giá trị và thông tin tài khoản của user vừa đăng nhập
            // Session::start();
            Session::put('auth', $check);
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã đăng nhập thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
            ]);
        }
    }
}
