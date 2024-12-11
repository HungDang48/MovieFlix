<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogcontroller extends Controller
{
    public function index()
    {
        return view('client.page.blog');
    }
}
