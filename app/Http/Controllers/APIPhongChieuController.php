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
}
