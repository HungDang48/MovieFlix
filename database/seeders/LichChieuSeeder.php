<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LichChieuSeeder extends Seeder
{
    public function run()
    {
        DB::table('lich_chieus')->delete();
        DB::table('lich_chieus')->truncate();
        DB::table('lich_chieus')->insert([
            [
                'id_phim'       => 1,
                'id_phong'      => 1,
                'gio_bat_dau'   => '2023-08-16 06:00:00',
                'gio_ket_thuc'  => '2023-08-16 09:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 1,
                'id_phong'      => 2,
                'gio_bat_dau'   => '2023-08-16 06:00:00',
                'gio_ket_thuc'  => '2023-08-16 09:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 1,
                'gio_bat_dau'   => '2023-08-17 10:00:00',
                'gio_ket_thuc'  => '2023-08-17 12:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 2,
                'gio_bat_dau'   => '2023-08-17 10:00:00',
                'gio_ket_thuc'  => '2023-08-17 12:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 2,
                'id_phong'      => 3,
                'gio_bat_dau'   => '2023-08-17 10:00:00',
                'gio_ket_thuc'  => '2023-08-17 12:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 1,
                'gio_bat_dau'   => '2023-08-23 14:00:00',
                'gio_ket_thuc'  => '2023-08-23 16:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 2,
                'gio_bat_dau'   => '2023-08-23 14:00:00',
                'gio_ket_thuc'  => '2023-08-23 16:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 3,
                'gio_bat_dau'   => '2023-08-23 14:00:00',
                'gio_ket_thuc'  => '2023-08-23 16:00:00',
                'trang_thai'    => 0,
            ],
            [
                'id_phim'       => 3,
                'id_phong'      => 4,
                'gio_bat_dau'   => '2023-08-23 14:00:00',
                'gio_ket_thuc'  => '2023-08-23 16:00:00',
                'trang_thai'    => 0,
            ],
        ]);
    }
}
