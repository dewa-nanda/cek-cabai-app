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
        'derajat_kepercayaan',
        'kemiripan_kasus',
        'valid',
        'pakar',
    ];

    public function getAllRelatedSymptom()
    {
        $data = CaseForSymptom::where('chi_case_id', $this->id)->get();

        return $data;
    }

    public function checkSimilarSymptom($symptom)
    {
        $gejala = CaseForSymptom::where('chi_case_id', $this->id)->get();
        $isSame = false;

        foreach($gejala as $item){
            foreach($symptom as $value){
                if($item->symptom_id == $value['id']){
                    $isSame = true;
                }else{
                    $isSame = false;
                }
            }
        }

        return $isSame;
    }

    public function GetNK($symptom)
    {
        $data = CaseForSymptom::where('chi_case_id', $this->id)->get()
            ->where('symptom_id', $symptom)->first();

        if($data == null) {
            return 0;
        }

        return $data->tingkat_kerusakan/100;
    }

    public function updateRelatedSymptom($symptom, $value)
    {
        if($symptom->id == $value['id'])
        {
            $symptom->update([
                'mb' => $value['mb'],
                'md' => $value['md'],
            ]);
        }

    }

    public function updateHasValid($tingkat_kepercayaan)
    {
        $tingkat_kepercayaan*=100;
        if($tingkat_kepercayaan > 70) {
            $this->update([
                'valid' => 'valid',
            ]);            
        }else{
            $this->update([
                'valid' => 'notValid',
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
