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
    // page untuk memberikan list gejala pada tanaman cabai milik petani
    public function indexView(){
        $data = [
            'gejala' => Symptom::get(),
        ];

        return view('pages.cekKesehatan.index', $data);
    }

    // page untuk menentukan bobot kerusakan dari tiap gejala yang diinputkan oleh petani
    public function bobotGejala(Request $request){
        $gejala = [];

        foreach($request->gejala as $item) {
            $gejala[] = Symptom::find($item);
        }

        $data = [
            'gejala' => $gejala,
        ];

        return view('pages.cekKesehatan.bobot', $data);
    }

    public function cekKesehatanAction(Request $request){
        $gejala = [];
        foreach($request->tp as $key => $item) {
            $data['id'] = $key;
            $data['tp'] = $item/100;
            array_push($gejala, $data);
        }

        
        $case = ChiCase::where('valid', 'valid')->get();

        $allResult = [];
        $finalResult = [];

        // 3 gejala = 2, 5, 8

        foreach($case as $key => $value) {
            $nilai_atas = 0;
            $nilai_bawah = 0;

            // dd($value->getAllRelatedSymptom());

            foreach($gejala as $item) {
                $nilai_atas += $value->GetNK($item);
            }

            foreach($value->getAllRelatedSymptom() as $item){
                // 0.9
                $nilai_bawah += $item->mb/100;
            }

            // dd($gejala, $nilai_atas, $nilai_bawah);
            $allResult[] = [
                'penyakit' => $value->disease_id,
                'related_symptom' => $value->getAllRelatedSymptom(),
                'nb' => $nilai_bawah,
                'na' => $nilai_atas,
                'nilai' => $nilai_atas/$nilai_bawah
            ];
        }

        // cari nilai tertinggi
        foreach($allResult as $key => $item) {
            if($key == 0){
                array_push($finalResult, $allResult[0]);
                continue;
            }

            if($item['nilai'] >= $finalResult[0]['nilai']){
                if(count($item['related_symptom']) < count($finalResult[0]['related_symptom'])){
                    continue;
                }else{
                    array_pop($finalResult);    
                    array_push($finalResult, $item);
                }
            }
        }


        dd($finalResult, $allResult);

        $case = ChiCase::create([
            'disease_id' => $finalResult['penyakit'],
            'tingkat_kepercayaan' => $finalResult['nilai'],
            'pakar' => 0,
        ]);

        foreach($gejala as $item) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $item['id'],
                'mb' => $item['tp']*100,
                'md' => 100-($item['tp']*100),
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