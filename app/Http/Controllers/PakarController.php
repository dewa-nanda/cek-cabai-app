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
        $cf = [];
        $cfGabungan = 0;

        foreach($request->case as $key => $case) {
            $cf[$key] = ($case["mb"] - $case["md"])/100;
        }

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

        foreach($request->gejala as $gejala) {
            DiseaseForSymptoms::create([
                'disease_id' => $disease->id,
                'symptom_id' => $gejala['id'],
                'tingkat_kepercayaan' => $gejala['tk'],
            ]);
        }

        return redirect()->route('penyakitView');
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
