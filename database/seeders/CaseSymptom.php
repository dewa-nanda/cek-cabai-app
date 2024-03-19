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
            'mb' => 80,
            'md' => 20
            ],
            [
            'chi_case_id' => 1,
            'symptom_id' => 3,
            'mb' => 30,
            'md' => 70
            ],
            [
            'chi_case_id' => 1,
            'symptom_id' => 4,
            'mb' => 40,
            'md' => 70
            ],
            [
            'chi_case_id' => 1,
            'symptom_id' => 5,
            'mb' => 10,
            'md' => 90
            ],
            [
            'chi_case_id' => 1,
            'symptom_id' => 6,
            'mb' => 50,
            'md' => 50
            ],
            [
            'chi_case_id' => 1,
            'symptom_id' => 3,
            'mb' => 30,
            'md' => 70
            ],
        ]);
    }
}
