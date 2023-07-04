<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function index()
    {
        return view('admin.page.dich_vu.index');
    }
}
