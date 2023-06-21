<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class APIPhimController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        Phim::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phim thành công!'
        ]);
    }

    public function data()
    {
        $data   = Phim::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        $phim   = Phim::find($request->id);
        if($phim) {
            if($phim->hien_thi == 1) {
                $phim->hien_thi = 0;
            } else {
                $phim->hien_thi = 1;
            }
            $phim->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phim không tồn tại!'
            ]);
        }
    }

    public function info(Request $request)
    {
        $phim   = Phim::find($request->id);
        if($phim) {
            return response()->json([
                'status'    => 1,
                'data'      => $phim
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Phim không tồn tại!'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $phim   = Phim::find($request->id);
        if($phim) {
            $phim->delete();
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
}
