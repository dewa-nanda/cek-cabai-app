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
        dd($request->all());
        $case = ChiCase::where('valid', 1)->get();

        $allResult = [];
        $finalResult = [];

        dd($request->all());

        foreach($case as $key => $value) {
            $nilai_atas = 0;
            $nilai_bawah = 0;

            foreach($request->gejala as $item) {
                $nilai_atas += $value->GetNK($item);
            }

            foreach($value->getAllRelatedSymptom() as $item){
                $nilai_bawah += $item->mb;
            }

            $allResult[] = [
                'penyakit' => $value->disease_id,
                'gejala' => $request->gejala,
                'nilai' => $nilai_atas/$nilai_bawah
            ];
        }


        dd($allResult);

        // cari nilai tertinggi
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