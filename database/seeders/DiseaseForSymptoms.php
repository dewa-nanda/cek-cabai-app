<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiseaseForSymptoms extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('disease_for_symptoms')->insert([
            [
                'disease_id' => 1,
                'symptom_id' => 1,
                'tingkat_kepercayaan' => 80
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 3,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 4,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 5,
                'tingkat_kepercayaan' => 10
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 6,
                'tingkat_kepercayaan' => 50
            ],
            [
                'disease_id' => 1,
                'symptom_id' => 8,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 3,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 4,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 5,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 2,
                'symptom_id' => 6,
                'tingkat_kepercayaan' => 60
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 2,
                'tingkat_kepercayaan' => 80
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 3,
                'tingkat_kepercayaan' => 10
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 4,
                'tingkat_kepercayaan' => 30
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 5,
                'tingkat_kepercayaan' => 10
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 6,
                'tingkat_kepercayaan' => 10
            ],
            [
                'disease_id' => 3,
                'symptom_id' => 7,
                'tingkat_kepercayaan' => 50
            ],
            [
                'disease_id' => 4,
                'symptom_id' => 9,
                'tingkat_kepercayaan' => 80
            ],
            [
                'disease_id' => 4,
                'symptom_id' => 10,
                'tingkat_kepercayaan' => 80
            ],
            [
                'disease_id' => 4,
                'symptom_id' => 12,
                'tingkat_kepercayaan' => 80
            ],
            [
                'disease_id' => 5,
                'symptom_id' => 11,
                'tingkat_kepercayaan' => 80
            ],
        ]);
    }
}
