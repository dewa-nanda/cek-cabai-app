<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiCase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'disease_id',
        'user_id',
        'tingkat_kepercayaan',
        'valid',
    ];

    public function getAllRelatedSymptom()
    {
        $data = CaseForSymptom::where('chi_case_id', $this->id)->get();

        return $data;
    }

    public function GetNK($id_symptoms)
    {
        $data = CaseForSymptom::where('chi_case_id', $this->id)
            ->where('symptom_id', $id_symptoms)
            ->first();

        if($data == null) {
            return 0;
        }

        return $data->tk; ;
    }

    public function updateRelatedSymptom($symptom, $value)
    {
        $symptom->update([
            'mb' => $value['mb'],
            'md' => $value['md'],
            'tk' => $value['mb'],
        ]);
    }

    public function updateHasValid($tingkat_kepercayaan)
    {
        $tingkat_kepercayaan = $tingkat_kepercayaan * 100;

        if($tingkat_kepercayaan > 70) {
            $this->update([
                'valid' => 1,
                'tingkat_kepercayaan' => $tingkat_kepercayaan,
            ]);            
        }else{
            $this->update([
                'valid' => 0,
                'tingkat_kepercayaan' => $tingkat_kepercayaan,
            ]);
        }
    }

    public function getDisease()
    {
        return Disease::find($this->disease_id);
    }

    public function getUser()
    {
        return User::find($this->user_id);
    }
}
