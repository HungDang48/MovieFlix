<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            [
                'ten_chuc_nang'     =>  'Chức năng 1',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 2',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 3',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 4',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 5',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 6',
                'ten_group'         =>  'A',
            ],
            [
                'ten_chuc_nang'     =>  'Chức năng 7',
                'ten_group'         =>  'A',
            ],
        ]);
    }
}
