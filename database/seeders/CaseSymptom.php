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
                'mb' => 70,
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
                'mb' => 50,
                'md' => 50
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 5,
                'mb' => 30,
                'md' => 70
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 6,
                'mb' => 50,
                'md' => 50
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 3,
                'mb' => 30,
                'md' => 70
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 4,
                'mb' => 30,
                'md' => 70
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 5,
                'mb' => 30,
                'md' => 70
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 6,
                'mb' => 50,
                'md' => 50
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 2,
                'mb' => 70,
                'md' => 20
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 3,
                'mb' => 90,
                'md' => 10
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 4,
                'mb' => 70,
                'md' => 20
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 5,
                'mb' => 90,
                'md' => 10
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 6,
                'mb' => 90,
                'md' => 10
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 7,
                'mb' => 50,
                'md' => 50
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 9,
                'mb' => 70,
                'md' => 20
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 10,
                'mb' => 70,
                'md' => 20
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 12,
                'mb' => 70,
                'md' => 20
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 11,
                'mb' => 70,
                'md' => 20
            ],
        ]);
    }
}
