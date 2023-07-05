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
}
