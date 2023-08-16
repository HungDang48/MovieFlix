<?php

namespace App\Http\Controllers;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function index()
    {
        return view('admin.page.lich_chieu.index');
    }

    public function create()
    {
        // Tạo session tên là s_1 có giá trị là dzfullstack
        // Session::start();
        Session::put('s_1', 'dzfullstack');
        Session::put('s_2', 'quoclongdn222g@gmail.com');
        Session::save();
        // Tạo cookie tên là c_1 có giá trị 32 Xuân Diệu
        // Vì cookie lưu ở client (trình duyệt) cho nên chúng ta phải return respone

        return response('x')->withCookie(Cookie('c_1', '32 Xuân Diệu', 1440));
    }

    public function read(Request $request)
    {
        // Lấy giá trị s_1 của session. Không cần Request vì Session nó được lưu ở Server
        $value        =   Session::get('auth');
        dd($value);
    }
}
