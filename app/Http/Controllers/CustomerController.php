<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function viewRegister()
    {
        return view('client.register_login.index');
    }

    public function viewLogin()
    {
        return view('client.register_login.index');
    }
}
