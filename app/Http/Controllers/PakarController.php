<?php

namespace App\Http\Controllers;

use App\Models\CaseForSymptom;
use App\Models\ChiCase;
use App\Models\Disease;
use App\Models\DiseaseForSymptoms;
use App\Models\Symptom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PakarController extends Controller
{
    //
    public function dashboardPakar() {
        $allCase = ChiCase::get();
        $nonValidCase = $allCase->where('valid', null);

        $data = [
            'allCase' => $allCase,
            'nonValidCase' => $nonValidCase,
        ];

        return view('pages.pakar.dashboard', $data);
    }

    public function kasusView() {
        $allCase = ChiCase::get();
        $nonValidCase = $allCase->where('valid', null);

        $data = [
            'allCase' => $allCase,
            'nonValidCase' => $nonValidCase,
        ];

        return view('pages.pakar.kasus.index', $data);
    }

    public function detailKasusView($id) {
        $case = ChiCase::find($id);

        $data = [
            'case' => $case,
        ];

        return view('pages.pakar.kasus.detail', $data);
    }

    public function validasiKasus(Request $request) {
        dd($request->all());
        $cf = [];
        $cfGabungan = 0;

        foreach($request->case as $key => $case) {
            $cf[$key] = ($case["mb"] - $case["md"])/100;
        }
        
        dd($cf);

        $case = ChiCase::find(request()->segment(count(request()->segments())));
        $getAllRelatedSymptom = $case->getAllRelatedSymptom();

        foreach($getAllRelatedSymptom as $key => $symptom) {
            $case->updateRelatedSymptom($symptom, $request->case[$key]);
        }

        $last_key = array_keys($cf);
        $last_key = end($last_key);

        foreach($cf as $key => $value) {
            if($key != $last_key) {
                if($key == 0){
                    $cfGabungan = $value + $cf[$key + 1] * (1 - $value);
                }else{
                    $cfGabungan = $cfGabungan + $value * (1 - $cfGabungan);
                    dd($cfGabungan);
                }
            }
        }

        // chicase valid kalo threshold > 70%

        $case->updateHasValid($cfGabungan);

        return redirect()->route('resultKasus', $case->id);
    }

    public function resultKasus($id) {
        $case = ChiCase::find($id);
        $lengthGejala = count($case->getAllRelatedSymptom());

        $data = [
            'case' => $case,
            'lengthGejala' => $lengthGejala,
        ];

        return view('pages.pakar.kasus.result', $data);
    }

    public function allKasusView() {
        $allCase = ChiCase::get();
        $nonValidCase = $allCase->where('valid', '!=', null);

        $data = [
            'allCase' => $allCase,
            'nonValidCase' => $nonValidCase,
        ];

        return view('pages.pakar.kasus.allKasus', $data);
    }

    // Penyakit Page Section
    public function penyakitView() {
        $data = [
            'listPenyakit' => Disease::get()
        ];
        
        return view('pages.pakar.penyakit.index', $data);
    }

    public function addPenyakitView() { 
        $data = [
            'listGejala' => Symptom::get()
        ];

        return view('pages.pakar.penyakit.addPenyakit', $data);
    }

    public function addPenyakitAction(Request $request) {        
        $disease = Disease::create([
            'name' => $request->nama_penyakit,
            'description' => $request->desc,
            'cara_penanganan' => $request->caraPenanganan,
        ]);


        $case = ChiCase::create([
            'user_id' => auth()->user()->id,
            'disease_id' => $disease->id,
            'valid' => 1,
            'pakar' => 1,
        ]);

        foreach($request->gejala as $gejala) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $gejala['id'],
                'mb' => $gejala['tk'],
                'md' => 100-$gejala['tk'],
            ]);
        }

        // rubah jadi mb md

        $cf = [];
        $cfGabungan = 0;

        foreach($request->gejala as $key => $gejala) {
            $mb = $gejala['tk'];
            $md = 100-$gejala['tk'];

            $cf[$key] = ($mb - $md)/100;
        }

        $last_key = array_keys($cf);
        $last_key = end($last_key);

        foreach($cf as $key => $value) {
            if($key == 0){
                if($last_key == $key){
                    $cfGabungan = $cfGabungan + $value * (1 - $cfGabungan);
                }else{
                    $cfGabungan = $value + $cf[$key + 1] * (1 - $value);
                }
            }else{
                $cfGabungan = $cfGabungan + $value * (1 - $cfGabungan);
            }            
        }

        $case->tingkat_kepercayaan = $cfGabungan*100;
        $case->save();

        return redirect()->route('penyakitView');
    }

    public function addKasusView() {
        $data = [
            'listGejala' => Symptom::get(),
            'listPenyakit' => Disease::get()
        ];

        return view('pages.pakar.penyakit.addCase', $data);
    }

    public function gejalaView() {
        $data = [
            'listGejala' => Symptom::get()
        ];

        return view('pages.pakar.gejala.index', $data);
    }

    public function addGejalaView() {
        return view('pages.pakar.gejala.addGejala');
    }

    public function addGejalaAction(Request $request) {
        Symptom::create([
            'name' => $request->nama_gejala,
            'description' => $request->desc,
        ]);

        return redirect()->route('gejalaView');
    }
}
