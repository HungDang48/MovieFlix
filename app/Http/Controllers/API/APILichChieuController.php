<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LichChieu;
use App\Models\Phim;
use App\Models\PhongChieu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APILichChieuController extends Controller
{
    public function data(Request $request)
    {
        $data       =   LichChieu::join('phims', 'phims.id', 'lich_chieus.id_phim')
                                 ->join('phong_chieus', 'lich_chieus.id_phong', 'phong_chieus.id')
                                 ->select('lich_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong')
                                 ->get();

        $today      =   Carbon::today();

        $ds_phim    =   Phim::where('hien_thi', 1)
                            ->where('ket_thuc', '>', $today)
                            ->get();

        $ds_phong   =   PhongChieu::where('tinh_trang', 1)
                                  ->get();

        return response()->json([
            'data'      =>  $data,
            'ds_phim'   =>  $ds_phim,
            'ds_phong'  =>  $ds_phong,
        ]);
    }

    public function store(Request $request)
    {
        $data   = $request->all();

        LichChieu::create($data);

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã thêm mới lịch chiếu thành công!',
        ]);
    }

    public function status(Request $request)
    {
        $lich_chieu     = LichChieu::find($request->id);

        if($lich_chieu) {
            // Nếu lịch chiếu đang chuyển từ hoạt động  => tạm tắt
            if($lich_chieu->trang_thai == 1) {
                $lich_chieu->trang_thai = 0;
                $lich_chieu->save();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã hủy lịch chiếu phim!',
                ]);
            } else {
                // B1: ta cần kiểm ta xem tại phòng này và thời gian này có chiếu phim khác chưa
                // B2: nếu là chưa
                $check  = random_int(0, 1);

                if($check == false) {
                    $lich_chieu->trang_thai = 1;
                    $lich_chieu->save();

                    return response()->json([
                        'status'    => 1,
                        'message'   => 'Đã kích hoạt lịch chiếu phim!',
                    ]);
                } else {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Giờ này đã có lịch chiếu phim khác!',
                    ]);
                }
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Lịch chiếu không tồn tại!',
            ]);
        }
    }

    public function update(Request $request){
        $lichChieu   = LichChieu::find($request->id);
        if($lichChieu) {
            $data   = $request->all();
            $lichChieu->update($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Lịch chiếu không tồn tại!'
            ]);
        }
    }
    public function destroy(Request $request){
        $lichChieu     =   LichChieu::find($request->id);

        if($lichChieu) {
            $lichChieu->delete();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa lịch chiếu thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'lịch chiếu không tồn tại!',
            ]);
        }
    }
}
