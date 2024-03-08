<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiseaseForSymptoms extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'disease_id',
        'symptom_id',
        'tingkat_kepercayaan',
    ];

    public function GetSymptoms()
    {
        $data = Symptom::where('id', $this->symptom_id)->first();

        return $data;
    }
}
