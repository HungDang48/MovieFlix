<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ten_phim'          => 'required|',
            'slug_phim'         => 'required|required|unique:phims,slug_ten_phim',
            'hinh_anh'          => 'required|',
            'dao_dien'          => 'required|',
            'dien_vien'         => 'required|',
            'the_loai'          => 'required|',
            'thoi_luong'        => 'required|numeric|min:60',
            'ngon_ngu'          => 'required|',
            'rated'             => 'required|',
            'mo_ta'             => 'required|min:20',
            'trailer'           => 'required|',
            'bat_dau'           => 'required|',
            'ket_thuc'          => 'required|',
            'hien_thi'          => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'ten_phim.*'          => 'Tên phim không yêu cầu không để trống!',
            'slug_phim.*'         => 'Phim này đã tồn tại trong hệ thống!',
            'hinh_anh.*'          => 'Hình ảnh yêu cầu không để trống!',
            'dao_dien.*'          => 'Đạo diễn yêu cầu không để trống!',
            'dien_vien.*'         => 'Diễn viên yêu cầu không để trống!',
            'the_loai.*'          => 'Thể loại yêu cầu không để trống!',
            'thoi_luong.*'        => 'Thời lượng phải nhiều hơn 60 phút!',
            'ngon_ngu.*'          => 'Ngôn ngữ yêu cầu không để trống!',
            'rated.*'             => 'Rated yêu cầu không để trống!',
            'mo_ta.required'      => 'Mô tả phim yêu cầu không để trống!',
            'mo_ta.min'           => 'Mô tả phim phải nhiều hơn 20 ký tự!',
            'trailer.*'           => 'Trailer yêu cầu không được bỏ trống!',
            'bat_dau.*'           => 'Thời gian bắt đầu yêu cầu không được bỏ trống!',
            'ket_thuc.*'          => 'Thời gian kết thúc yêu cầu không được bỏ trống!',
            'hien_thi.*'          => 'Tình trạng yêu cầu không để trống!',
        ];
    }
}
