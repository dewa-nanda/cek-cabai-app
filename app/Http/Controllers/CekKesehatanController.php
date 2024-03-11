<?php

namespace App\Http\Controllers;

use App\Models\CaseForSymptom;
use App\Models\ChiCase;
use App\Models\Disease;
use App\Models\DiseaseForSymptoms;
use App\Models\Symptom;
use Illuminate\Http\Request;

class CekKesehatanController extends Controller
{
    //
    public function indexView(){
        $data = [
            'gejala' => Symptom::get(),
        ];

        return view('pages.cekKesehatan.index', $data);
    }

    public function cekKesehatanAction(Request $request){
        $penyakit = Disease::get();
        
        $allResult = [];
        $finalResult = [];
        
        foreach ($penyakit as $key => $value) {
            $nilai_atas = 0;
            $nilai_bawah = 0;

            foreach($request->gejala as $item) {
                $nilai_atas += $value->GetNK($item);
            }

            foreach($value->GetListOfSymptoms() as $item) {
                $nilai_bawah += $item->tingkat_kepercayaan;
            }

            $allResult[$key] = [
                'penyakit' => $value->id,
                'gejala' => $request->gejala,
                'nilai' => $nilai_atas/$nilai_bawah
            ];
        }

        foreach($allResult as $key => $item) {
            if($key == 0){
                $finalResult = $item;
            } else {
                if($item['nilai'] > $finalResult['nilai']) {
                    $finalResult = $item;
                }
            }
        }

        $case = ChiCase::create([
            'disease_id' => $finalResult['penyakit'],
            'tingkat_kepercayaan' => $finalResult['nilai']*100,
        ]);

        foreach($finalResult['gejala'] as $item) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $item,
            ]);
        }

        return redirect()->route('resultCekKesehatanView', $case->id);
    }

    public function resultCekKesehatanView($id){
        $case = ChiCase::find($id);


        $data = [
            'case' => $case,
            'penyakit' => Disease::find($case->disease_id),
            'gejala' => $case->getAllRelatedSymptom(),
        ];

        return view('pages.cekKesehatan.hasil', $data);
    }
}