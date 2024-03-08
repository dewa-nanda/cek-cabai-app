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
        'symptoms',
    ];

    public function GetListOfSymptoms()
    {
        $getAllSymptoms = DiseaseForSymptoms::where('disease_id', $this->id)->get();

        return $getAllSymptoms;
    }
}
