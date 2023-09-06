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

    public function viewForgotPassword()
    {
        return view('client.password.forgot_password');
    }

    public function viewChangePassword()
    {
        return view('client.password.change_password');
    }

    public function viewListBill()
    {
        return view('client.page.list_bill');
    }
}
