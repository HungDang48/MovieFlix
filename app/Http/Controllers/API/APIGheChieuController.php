<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIGheChieuController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
    }
}
