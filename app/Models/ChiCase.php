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
        'tingkat_kepercayaan',
        'valid',
    ];

    public function getAllRelatedSymptom()
    {
        $data = CaseForSymptom::where('chi_case_id', $this->id)->get();

        return $data;
    }
}
