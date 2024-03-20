<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'name',
        'description',
        'cara_penanganan',
    ];

    public function GetListOfSymptoms()
    {
        $getAllSymptoms = ChiCase::where('disease_id', $this->id)->first()->getAllRelatedSymptom();

        return $getAllSymptoms;
    }

    public function GetListOfCase()
    {
        $getAllCase = ChiCase::where('disease_id', $this->id)->get();

        // dd($getAllCase);
        return $getAllCase;
    }

    public function GetNK($id_symptoms)
    {
        // $data = DiseaseForSymptoms::where('disease_id', $this->id)
        //     ->where('symptom_id', $id_symptoms)
        //     ->first();
            
        // if($data == null) {
        //     return 0;
        // }

        // return $data->tingkat_kepercayaan; ;
    }
}
