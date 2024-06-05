<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
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
    ];

    public function GetListOfCase()
    {
        $getAllCase = CaseForSymptom::where('symptom_id', $this->id)
                    ->get();

        $case = [];

        foreach($getAllCase as $key => $value) {
            $case[] = $value->chi_case_id;
        }

        $case = array_unique($case);
        foreach($case as $key => $value) {
            $case[$key] = ChiCase::find($value);
        }
        
        return $case;
    }
    public function validSymptom()
    {
        $case = CaseForSymptom::where('symptom_id', $this->id)
            ->get()->first();

        if($case == null){
            return false;
        }else{
            return true;
        }
    }
}
