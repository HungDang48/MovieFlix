<?php

namespace App\Http\Controllers;

use App\Models\DanhSachTaiKhoan;
use Illuminate\Http\Request;

class APIDanhSachTaiKhoanController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        DanhSachTaiKhoan::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phim thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
        if($danhSachTaiKhoan) {
            $data   = $request->all();
            $danhSachTaiKhoan->update($data);

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

        $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
        // dd($danhSachTaiKhoan);
        if($danhSachTaiKhoan) {
            if($danhSachTaiKhoan->tinh_trang == 1) {
                $danhSachTaiKhoan->tinh_trang = 0;
            } else {
                $danhSachTaiKhoan->tinh_trang = 1;
            }
            $danhSachTaiKhoan->save();

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
    }

    public function block(Request $request)
    {

        $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
        // dd($danhSachTaiKhoan);
        if($danhSachTaiKhoan) {
            if($danhSachTaiKhoan->is_block == 1) {
                $danhSachTaiKhoan->is_block = 0;
            } else {
                $danhSachTaiKhoan->is_block = 1;
            }
            $danhSachTaiKhoan->save();

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
    }

    public function info(Request $request)
    {
        $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
        if($danhSachTaiKhoan) {
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
    }

    public function destroy(Request $request)
    {
        $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);

        if($danhSachTaiKhoan) {
            $danhSachTaiKhoan->delete();
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
    }
}
