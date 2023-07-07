<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DonVi;
use Illuminate\Http\Request;

class APIDonViController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        DonVi::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới đơn vị thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $Don_vi   = DonVi::find($request->id);
        if($Don_vi) {
            $data   = $request->all();
            $Don_vi->update($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Đơn vị không tồn tại!'
            ]);
        }
    }

    public function data()
    {
        $data   = DonVi::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        $Don_vi     =   DonVi::find($request->id);

        if($Don_vi) {
            $Don_vi->delete();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa đơn vị thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Đơn vị không tồn tại!',
            ]);
        }
    }

}
