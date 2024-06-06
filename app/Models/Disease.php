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

    // mengambil list gejala pada kasus pertama yang terkait dengan penyakit
    public function GetFirstValidSymptoms()
    {
        // $getAllSymptoms = ChiCase::where('disease_id', $this->id)->first()->getAllRelatedSymptom();
        $getAllSymptoms = ChiCase::where('disease_id', $this->id);
        $getAllSymptoms = $getAllSymptoms->where('pakar', 1);
        if($getAllSymptoms->first() != null){
            $getAllSymptoms = ChiCase::where('disease_id', $this->id)->first()->getAllRelatedSymptom();
        }else{
            $getAllSymptoms = [];
        }

        return $getAllSymptoms;
    }

    // mengambil list kasus yang terkait dengan penyakit
    public function GetListOfCase()
    {
        $getAllCase = ChiCase::where('disease_id', $this->id)
                    ->where('valid', 'valid')
                    ->get();

        return $getAllCase;
    }

    public function GetListOfValidCase($pakar, $valid = 'valid')
    {
        $getAllCase = ChiCase::where('disease_id', $this->id)
                    ->where('pakar', $pakar)
                    ->where('valid', $valid)
                    ->get();

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
