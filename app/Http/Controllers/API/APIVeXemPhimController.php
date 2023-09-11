<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\sendMail;
use App\Models\DonHang;
use App\Models\DonVi;
use App\Models\VeXemPhim;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class APIVeXemPhimController extends Controller
{
    public function datVeXemPhim(Request $request)
    {
        $nguoi_login    =   Auth::guard('client')->user();
        if($nguoi_login) {
            DB::beginTransaction();

            try {
                // Bước 1: tạo đơn hàng
                $donHang = DonHang::create([
                    'id_khach_hang'     =>  $nguoi_login->id,
                ]);

                $donHang->ma_don_hang   =   140823 + $donHang->id;
                $donHang->save();

                $tong_tien              =   0;

                foreach($request->ds_ve as $key => $value) {
                    if($value['choose'] == 1) {
                        $dong   = VeXemPhim::find($value['id']);
                        $dong->id_don_hang  = $donHang->ma_don_hang;
                        $dong->tinh_trang   = \App\Models\VeXemPhim::VE_DANG_GIU_CHO;
                        $dong->save();

                        $tong_tien = $tong_tien + $dong->gia_ve;
                    }
                }

                $donHang->tong_tien = $tong_tien;
                $donHang->save();

                // $ds_ve_xem_phim         =  VeXemPhim::where('ma_don_hang', $donHang->ma_don_hang)->get();

                $xxx['ho_va_ten']       =  $nguoi_login->ho_va_ten;
                // $xxx['don_dat_hang']	=  $ds_ve_xem_phim;
                $xxx['tong_tien']       =  $tong_tien;
                $xxx['noi_dung_ck']		=  'TTVXP_' . $donHang->ma_don_hang;

                Mail::to($nguoi_login->email)->send(new sendMail('Thông Tin Đặt Vé Xem Phim', 'mail.dat_ve', $xxx));

                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã đặt vé thành công!',
                ]);

            } catch(Exception $e) {
                Log::error($e);
                DB::rollBack();
            }
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Chức năng này yêu cầu phải đăng nhập',
            ]);
        }
    }
}
