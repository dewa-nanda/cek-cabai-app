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
            // Bobot kepercayaan diantara 25, 50, 75, 100
            // 5 gejala
            [
                'chi_case_id' => 1,
                'symptom_id' => 1,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 3,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 4,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 5,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 1,
                'symptom_id' => 6,
                'bobot_kepercayaan' => 50,
            ],
            // 5 gejala
            [
                'chi_case_id' => 2,
                'symptom_id' => 3,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 4,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 5,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 6,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 2,
                'symptom_id' => 2,
                'bobot_kepercayaan' => 75,
            ],
            // 5 gejala
            [
                'chi_case_id' => 3,
                'symptom_id' => 3,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 4,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 5,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 6,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 3,
                'symptom_id' => 7,
                'bobot_kepercayaan' => 50,
            ],
            // 5 gejala
            [
                'chi_case_id' => 4,
                'symptom_id' => 9,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 10,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 12,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 11,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 4,
                'symptom_id' => 15,
                'bobot_kepercayaan' => 25,
            ],
            // 5 gejala
            [
                'chi_case_id' => 5,
                'symptom_id' => 17,
                'bobot_kepercayaan' => 75,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 14,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 13,
                'bobot_kepercayaan' => 50,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 16,
                'bobot_kepercayaan' => 25,
            ],
            [
                'chi_case_id' => 5,
                'symptom_id' => 10,
                'bobot_kepercayaan' => 50,
            ],
        ]);
    }
}
