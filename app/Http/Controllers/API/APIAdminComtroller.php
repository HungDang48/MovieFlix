<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class APIAdminComtroller extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->all();

        Admin::create($data);

        return response()->json([
            'status'    => true,
            'message'   => 'Đã thêm mới phim thành công!'
        ]);
    }

    public function update(Request $request)
    {
        $admin   = Admin::find($request->id);
        if($admin) {
            $data   = $request->all();
            $admin->update($data);

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

    public function data()
    {
        $data   = Admin::get();

        return response()->json([
            'data'    => $data,
        ]);
    }

    public function destroy(Request $request)
    {
        $admin   = Admin::find($request->id);

        if($admin) {
            $admin->delete();
            return response()->json([
                'status'    => 1,
                'message'   => 'Đã xóa tài khoản thành công!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }

    public function block(Request $request)
    {

        $admin   = Admin::find($request->id);
        // dd($admin);
        if($admin) {
            if($admin->is_block == 1) {
                $admin->is_block = 0;
            } else {
                $admin->is_block = 1;
            }
            $admin->save();

            return response()->json([
                'status'    => 1,
                'message'   => 'Đã cập nhật trạng thái!'
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'Tài khoản không tồn tại!'
            ]);
        }
    }
}
