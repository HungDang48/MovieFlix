<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TapPhimController extends Controller
{
    public function index()
    {
        return view('admin.page.tap_phim.index');
    }
}
