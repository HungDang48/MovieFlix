<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIThongKeController extends Controller
{
    public function bt1(Request $request)
    {
        $xxx   =   Phim::join('lich_chieus', 'phims.id', 'lich_chieus.id_phim')
                        ->join('ve_xem_phims', 'lich_chieus.id', 've_xem_phims.id_lich_chieu')
                        ->where('ve_xem_phims.tinh_trang', 1)
                        ->whereDate('ve_xem_phims.created_at', '>=', $request->begin)
                        ->whereDate('ve_xem_phims.created_at', '<=', $request->end)
                        ->select('phims.ten_phim', 'phims.slug_phim', DB::raw('count(ve_xem_phims.id) as so_luong'))
                        ->groupBy('phims.ten_phim', 'phims.slug_phim')
                        ->get();

        $arr_1  =   [];
        $arr_2  =   [];

        foreach($xxx as $key => $v) {
            array_push($arr_1, $v->ten_phim);
            array_push($arr_2, $v->so_luong);
        }

        return response()->json([
            'status'    => 1,
            'data'      => $arr_2,
        ]);
    }
}
