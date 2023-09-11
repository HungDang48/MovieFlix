<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyTaiKhoanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'		        =>  'required|email|unique:danh_sach_tai_khoans,email',
            'password'          =>  'required|min:6|max:30',
            're_password'	    =>  'required|same:password',
            'so_dien_thoai'     =>  'required|digits_between:10,12',
            'ngay_sinh'         =>  'required|date',
            'dia_chi'           =>  'required|min:7|max:100',
            'ho_va_ten'         =>  'required|min:4|max:100',
        ];
    }

    public function messages()
    {
        return [
            'email.required'	=>  'Email yêu cầu phải nhập',
            'email.email'	    =>  'Email không đúng định dạng',
            'email.unique'	    =>  'Email đã tồn tại trong hệ thống',
            'password.*'        =>  'Password yêu cầu phải từ 6 đến 30 ký tự',
            're_password.*'     =>  'Hai mật khẩu không trùng kìa ku!',
        ];
    }
}
