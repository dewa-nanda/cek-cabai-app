<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseForSymptom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'chi_case_id',
        'symptom_id',
        'mb',
        'md',
        'tingkat_kerusakan',
    ];

    public function getSymptom()
    {
        return Symptom::find($this->symptom_id);
    }

    public function updateTingkatKerusakan($value)
    {
        $this->update([
            'tingkat_kerusakan' => $value,
        ]);
    }
}
