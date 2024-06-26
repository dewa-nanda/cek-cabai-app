<?php

namespace App\Http\Controllers;

use App\Models\CaseForSymptom;
use App\Models\ChiCase;
use App\Models\Disease;
use App\Models\DiseaseForSymptoms;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekKesehatanController extends Controller
{
    // page untuk melakukan cek kesehatan tanaman cabai (input gejala / case baru - case based reasoning)
    public function indexView(){
        $listGejalaValid = [];

        foreach(Symptom::get() as $item) {
            if($item->validSymptom()){
                $listGejalaValid[] = $item;
            }
        }

        $data = [
            'gejala' => $listGejalaValid,
        ];
        
        return view('pages.cekKesehatan.index', $data);
    }

    // Function cek kesehatan (retrieve - Case Based Reasoning)
    public function cekKesehatanAction(Request $request){
        if($request->gejala == null) {
            return redirect()->route('cekKesehatanView')->with('error', 'Harap masukan, setidaknya satu gejala!');
        }

        $id_user = null;
        if(Auth::check()){
            $id_user = Auth::user()->id;
        }

        $gejala = $request->gejala;
        
        // ambil semua data kasus yang valid
        $case = ChiCase::where('valid', 'valid')->get();

        $allResult = [];
        $finalResult = [];

        // dd($gejala, $case);
        
        // hitung menggunakan rumus CBR 
        foreach($case as $key => $value) {
            $nilai_atas = 0;
            $nilai_bawah = 0;
            
            foreach($gejala as $item) {
                $nilai_atas += $value->GetNK($item);
            }

            foreach($value->getAllRelatedSymptom() as $item){
                $nilai_bawah += $item->bobot_kepercayaan/100;
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
            'user_id' => $id_user,
            'disease_id' => $finalResult[0]['penyakit'],
            'kemiripan_kasus' => $finalResult[0]['nilai']*100,
            'pakar' => 0,
        ]);

        $data = [];
        foreach($gejala as $key => $item) {
            $data[$key] = CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $item,
            ]);
        }

        foreach($data as $item) {
            foreach($finalResult[0]['related_symptom'] as $value) {
                if($item->symptom_id == $value->symptom_id){
                    $item->update([
                        'bobot_kepercayaan' => $value->bobot_kepercayaan,
                    ]);
                }
            }
        }

        return redirect()->route('resultCekKesehatanView', $case->id);
    }

    // Page untuk menampilkan hasil cek kesehatan (reuse - Case Based Reasoning)
    public function resultCekKesehatanView($id){
        $case = ChiCase::find($id);

        $data = [
            'case' => $case,
            'penyakit' => Disease::find($case->disease_id),
            'gejala' => $case->getAllRelatedSymptom(),
        ];

        // dd($case);

        return view('pages.cekKesehatan.hasil', $data);
    }
}