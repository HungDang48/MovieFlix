<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function index()
    {
        $today          = Carbon::today();
        $phimDangChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '<=', $today)
                              ->whereDate('ket_thuc', '>=', $today)
                              ->get();

        $phimSapChieu  = Phim::where('hien_thi', 1)
                              ->whereDate('bat_dau', '>', $today)
                              ->get();

        return view('client.page.homepage', compact('phimDangChieu', 'phimSapChieu'));
    }

    public function detailPhim()
    {
        return view('client.page.film-detail');
    }


}
