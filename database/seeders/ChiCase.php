<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiCase extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('chi_cases')->insert([
            [
                'disease_id' => 1,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 2,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 3,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 4,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 5,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 6,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 7,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 8,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 9,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 10,
                'valid' => 'valid',
                'pakar' => 1,
            ],
            [
                'disease_id' => 11,
                'valid' => 'valid',
                'pakar' => 1,
            ],
        ]);
    }
}
