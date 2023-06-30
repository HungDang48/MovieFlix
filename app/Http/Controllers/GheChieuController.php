<?php

namespace App\Http\Controllers;

use App\Models\GheChieu;
use App\Models\PhongChieu;
use Illuminate\Http\Request;

class GheChieuController extends Controller
{
    public function index($id_phong)
    {
        return view('admin.page.ghe_chieu.index');
    }
}

