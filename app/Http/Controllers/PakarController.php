<?php

namespace App\Http\Controllers;

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

        // dd(ChiCase::find(1)->first()->getAllRelatedSymptom());

        $data = [
            'allCase' => $allCase,
            'nonValidCase' => $nonValidCase,
        ];

        return view('pages.pakar.kasus.index', $data);
    }

    public function detailKasusView($id) {
        $case = ChiCase::find($id)->first();

        $data = [
            'case' => $case,
        ];

        return view('pages.pakar.kasus.detail', $data);
    }

    public function allKasusView() {
        return view('pages.pakar.kasus.allKasus');
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
