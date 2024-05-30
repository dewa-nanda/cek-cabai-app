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
            // Thrips
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
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 1,
                    'symptom_id' => 6,
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 1,
                    'symptom_id' => 8,
                    'bobot_kepercayaan' => 50,
                ],
            // Kutu Daun
                [
                    'chi_case_id' => 2,
                    'symptom_id' => 3,
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 2,
                    'symptom_id' => 4,
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 2,
                    'symptom_id' => 6,
                    'bobot_kepercayaan' => 50,
                ],
            // Tungau
                [
                    'chi_case_id' => 3,
                    'symptom_id' => 2,
                    'bobot_kepercayaan' => 75,
                ],
                [
                    'chi_case_id' => 3,
                    'symptom_id' => 3,
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 3,
                    'symptom_id' => 4,
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
            // Lalat Buah
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
                    'bobot_kepercayaan' => 75,
                ],
            // Ulat Grayak
                [
                    'chi_case_id' => 5,
                    'symptom_id' => 11,
                    'bobot_kepercayaan' => 75,
                ],
            // Virus Kuning
                [
                    'chi_case_id' => 6,
                    'symptom_id' => 3,
                    'bobot_kepercayaan' => 25,
                ],
                [
                    'chi_case_id' => 6,
                    'symptom_id' => 5,
                    'bobot_kepercayaan' => 75,
                ],
            // Busuk Buah/ Patek
                [
                    'chi_case_id' => 7,
                    'symptom_id' => 13,
                    'bobot_kepercayaan' => 75,
                ],
            // Layu Fusarium
                [
                    'chi_case_id' => 8,
                    'symptom_id' => 14,
                    'bobot_kepercayaan' => 75,
                ],
                [
                    'chi_case_id' => 8,
                    'symptom_id' => 15,
                    'bobot_kepercayaan' => 50,
                ],
            // Layu Bakteri
                [
                    'chi_case_id' => 9,
                    'symptom_id' => 15,
                    'bobot_kepercayaan' => 50,
                ],
                [
                    'chi_case_id' => 9,
                    'symptom_id' => 16,
                    'bobot_kepercayaan' => 75,
                ],
            // Bercak Daun
                [
                    'chi_case_id' => 10,
                    'symptom_id' => 17,
                    'bobot_kepercayaan' => 75,
                ],
            // Busuk Batang
                [
                    'chi_case_id' => 11,
                    'symptom_id' => 18,
                    'bobot_kepercayaan' => 75,
                ],
        ]);
    }
}
