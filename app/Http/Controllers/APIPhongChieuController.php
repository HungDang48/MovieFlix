<?php

namespace App\Http\Controllers;

use App\Models\PhongChieu;
use Illuminate\Http\Request;

class APIPhongChieuController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        PhongChieu::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phòng chiếu thành công!'
        ]);
    }

    public function data()
    {
        $data   = PhongChieu::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        $phong   = PhongChieu::find($request->id);
        if($phong) {
            if($phong->tinh_trang == 1) {
                $phong->tinh_trang = 0;
            } else {
                $phong->tinh_trang = 1;
            }
            $phong->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }

    public function info(Request $request)
    {
        $phong   = PhongChieu::find($request->id);
        if($phong) {
            return response()->json([
                'status'    => 1,
                'data'      => $phong
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $phong   = PhongChieu::find($request->id);
        if($phong) {
            $phong->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa phòng thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }
    public function update(Request $request) {

        $phong  = PhongChieu::find($request->id);
        if ($phong){
            $data = $request->all();
            $phong->update($data);
            return response()->json([
                'status'    => 1,
                'message'   => 'Cập nhật thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phòng không tồn tại!'
            ]);
        }
    }
}
