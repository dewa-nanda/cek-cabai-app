<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("diseases")->insert([
            [
                'name' => 'Thrips',
                'description' =>  '',
                'cara_penanganan' =>  '',
            ],
            [
                'name' => 'Kutu Daun',
                'description' =>  '',
                'cara_penanganan' =>  '',
            ],
            [
                'name' => 'Tungau',
                'description' =>  '',
                'cara_penanganan' =>  '',
            ],
            [
                'name' => 'Lalat Buah',
                'description' =>  '',
                'cara_penanganan' =>  '',
            ],
            [
                'name' => 'Ulat Grayak',
                'description' =>  '',
                'cara_penanganan' =>  '',
            ],
        ]);
    }
}
