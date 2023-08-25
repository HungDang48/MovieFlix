<?php

namespace App\Http\Controllers\API;

use App\Models\PhongChieu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APIPhongChieuController extends Controller
{
    public function store(Request $request)
    {
        $id_chuc_nang   =   100;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $data   = $request->all();

            PhongChieu::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phòng chiếu thành công!'
            ]);

        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data()
    {
        $id_chuc_nang   =   101;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        $data   = PhongChieu::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        $id_chuc_nang   =   102;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $phong   = PhongChieu::find($request->id);
            if($phong) {
                if($phong->tinh_trang == 1) {
                    $phong->tinh_trang = 0;
                } else {
                    $phong->tinh_trang = 1;
                }
                $phong->save();
                DB::commit();

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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function info(Request $request)
    {
        $id_chuc_nang   =   103;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $phong   = PhongChieu::find($request->id);
            if($phong) {
                DB::commit();
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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }

    public function destroy(Request $request)
    {
        $id_chuc_nang   =   104;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $phong   = PhongChieu::find($request->id);
            if($phong) {
                $phong->delete();
                DB::commit();
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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
    public function update(Request $request)
    {
        $id_chuc_nang   =   105;
        $user_login     =   Auth::guard('admin')->user();

        $check          =   QuyenChucNang::where('id_quyen', $user_login->id_quyen)
                                         ->where('id_chuc_nang', $id_chuc_nang)
                                         ->first();
        if(!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {
            $phong  = PhongChieu::find($request->id);
            if ($phong){
                $data = $request->all();
                $phong->update($data);
                DB::commit();
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
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
        }

    }
}
