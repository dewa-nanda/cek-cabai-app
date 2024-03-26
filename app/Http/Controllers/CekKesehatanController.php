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

    // Function cek kesehatan (retrieve - Case Based Reasoning)
    public function cekKesehatanAction(Request $request){
        $gejala = [];

        // ambil data id gejala dan bobot kerusakan dari tiap gejala untuk ditaruh di dalam array $gejala
        foreach($request->tp as $key => $item) {
            $data['id'] = $key;
            $data['tp'] = $item/100;
            array_push($gejala, $data);
        }
        
        // ambil semua data kasus yang valid
        $case = ChiCase::where('valid', 'valid')->get();

        $allResult = [];
        $finalResult = [];

        // hitung menggunakan rumus CBR 
        foreach($case as $key => $value) {
            $nilai_atas = 0;
            $nilai_bawah = 0;
            
            foreach($gejala as $item) {
                $nilai_atas += $value->GetNK($item);
            }

            foreach($value->getAllRelatedSymptom() as $item){
                $nilai_bawah += $item->tingkat_kerusakan/100;
            }

            // dd($nilai_atas/$nilai_bawah);
            $allResult[] = [
                'penyakit' => $value->disease_id,
                'related_symptom' => $value->getAllRelatedSymptom(),
                'na' => $nilai_atas,
                'nb' => $nilai_bawah,
                'nilai' => $nilai_atas/$nilai_bawah
            ];
        }

        // dd($allResult);
        // cari nilai tertinggi
        foreach($allResult as $key => $item) {
            if($key == 0){
                array_push($finalResult, $allResult[0]);
                continue;
            }

            if($item['nilai'] > $finalResult[0]['nilai']){
                array_pop($finalResult);    
                array_push($finalResult, $item);
            }
            
            if($item['nilai'] == $finalResult[0]['nilai']){
                if(count($item['related_symptom']) < count($finalResult[0]['related_symptom'])){
                    continue;
                }else{
                    array_pop($finalResult);    
                    array_push($finalResult, $item);

                }
            }
        }


        $case = ChiCase::create([
            'disease_id' => $finalResult[0]['penyakit'],
            'tingkat_kepercayaan' => $finalResult[0]['nilai']*100,
            'pakar' => 0,
        ]);

        foreach($gejala as $item) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $item['id'],
                'tingkat_kerusakan' => $item['tp']*100,
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