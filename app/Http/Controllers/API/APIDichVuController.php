<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DichVu;
use Illuminate\Http\Request;

class APIDichVuController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        DichVu::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới dịch vụ thành công!',
        ]);
    }

    public function data(Request $request)
    {
        $data   = DichVu::all();

        return response()->json([
            'status'    => 1,
            'data'      => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        $dichVu     =   DichVu::find($request->id);

        if($dichVu) {
            $dichVu->delete();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }

    public function update(Request $request)
    {
        $dichVu     =   DichVu::find($request->id);
        if($dichVu) {
            $data   = $request->all();
            $dichVu->update($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }

    public function status(Request $request)
    {
        $dichVu     =   DichVu::find($request->id);
        if($dichVu) {
            $dichVu->tinh_trang     =   $dichVu->tinh_trang == 1 ? 0 : 1;
            $dichVu->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật dịch vụ thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Dịch vụ không tồn tại!',
            ]);
        }
    }
}
