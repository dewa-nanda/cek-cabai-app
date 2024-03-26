<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaseSymptom extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('case_for_symptoms')->insert(
           [ 
            [
                'chi_case_id' => 1,
                'symptom_id' => 1,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 3,
                'tingkat_kerusakan' => 30,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 4,
                'tingkat_kerusakan' => 50,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 5,
                'tingkat_kerusakan' => 30,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 6,
                'tingkat_kerusakan' => 50,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 3,
                'tingkat_kerusakan' => 30,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 4,
                'tingkat_kerusakan' => 30,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 5,
                'tingkat_kerusakan' => 30,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 6,
                'tingkat_kerusakan' => 50,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 2,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 3,
                'tingkat_kerusakan' => 90,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 4,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 5,
                'tingkat_kerusakan' => 90,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 6,
                'tingkat_kerusakan' => 90,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 7,
                'tingkat_kerusakan' => 50,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 9,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 10,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 12,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 11,
                'tingkat_kerusakan' => 70,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 15,
                'tingkat_kerusakan' => 50,
            ],
        ]);
    }
}
