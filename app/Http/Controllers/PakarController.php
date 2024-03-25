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
        $nonValidCase = ChiCase::get()->where('valid', 'notChecked');

        $data = [
            'nonValidCase' => $nonValidCase,
        ];

        return view('pages.pakar.dashboard', $data);
    }

    public function kasusView() {
        $nonValidCase = ChiCase::get()->where('valid', 'notChecked');

        $data = [
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
        $index = 0;

        foreach($request->tp as $key => $case) {
            $mb = $case;
            $md = 100 - $mb;

            $cf[$index]['id'] = $key;
            $cf[$index]['cf'] = ($mb - $md)/100;
            $cf[$index]['mb'] = $mb;
            $cf[$index]['md'] = $md;
            $index++;
        }

        $case = ChiCase::find(request()->segment(count(request()->segments())));
        $getAllRelatedSymptom = $case->getAllRelatedSymptom();

        foreach($getAllRelatedSymptom as $key => $symptom) {
            foreach($cf as $value) {
                $case->updateRelatedSymptom($symptom, $value);
            }
        }

        $last_key = array_keys($cf);
        $last_key = end($last_key);

        foreach($cf as $key => $value) {
            if($key != $last_key) {
                if($key == 0){
                    $cfGabungan = $value['cf'] + $cf[$key + 1]['cf'] * (1 - $value['cf']);
                }else{
                    $cfGabungan = $cfGabungan + $value['cf'] * (1 - $cfGabungan);
                }
            }else{
                if($key == 0){
                    $cfGabungan = $value['cf'];
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

    // Page List of Penyakit
    public function penyakitView() {
        $data = [
            'listPenyakit' => Disease::get()
        ];
        
        return view('pages.pakar.penyakit.index', $data);
    }

    // Page tambah penyakit
    public function addPenyakitView() { 
        $data = [
            'listGejala' => Symptom::get()
        ];

        return view('pages.pakar.penyakit.addPenyakit', $data);
    }

    // Fungsi menambahkan penyakit
    public function addPenyakitAction(Request $request) {   
        $disease = Disease::create([
            'name' => $request->nama_penyakit,
            'description' => $request->desc,
            'cara_penanganan' => $request->caraPenanganan,
        ]);


        $case = ChiCase::create([
            'user_id' => auth()->user()->id,
            'disease_id' => $disease->id,
            'valid' => 'valid',
            'pakar' => 1,
        ]);

        foreach($request->gejala as $gejala) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $gejala['id'],
                'mb' => $request['tp'][$gejala['id']],
                'md' => 100-$request['tp'][$gejala['id']],
            ]);
        }

        // rubah jadi mb md

        $cf = [];
        $cfGabungan = 0;
        $cek = [];
        foreach($request->gejala as $key => $gejala) {
            $cek[] = $request['tp'][$gejala['id']];
            $mb = $request['tp'][$gejala['id']];
            $md = 100-$request['tp'][$gejala['id']];

            $cf[$key] = ($mb - $md)/100;
        } 

        $last_key = array_keys($cf);
        $last_key = end($last_key);

        foreach($cf as $key => $value) {
            if($key == 0){
                if($last_key == $key){
                    $cfGabungan = $cfGabungan + $value * (1 - $value);
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

    public function addKasus(Request $request) {
        // cek apakah sudah ada kasus yang sama atau belum
    
        $penyakit = Disease::find($request->penyakit_target);

        // dd($request->all());
        
        foreach($penyakit->GetListOfCase() as $key => $item)
        {
            if($item->checkSimilarSymptom($request->gejala) == true)
            {
                return redirect()->route('addKasusView')->with('error', 'Kasus yang sama sudah ada');
            }
        }

        // hitung nilai cf untuk menentukan tingkat kepercayaan
        $cf = [];
        $cfGabungan = 0;

        foreach($request->gejala as $key => $item){
            $mb = $request->tp[$item['id']];
            $md = 100 - $mb;

            $cf[$key]['id'] = $item['id'];
            $cf[$key]['cf'] = ($mb - $md)/100;
        }

        $last_key = array_keys($cf);
        $last_key = end($last_key);

        foreach($cf as $key => $value) {
            if($key != $last_key) {
                if($key == 0){
                    $cfGabungan = $value['cf'] + $cf[$key + 1]['cf'] * (1 - $value['cf']);
                }else{
                    $cfGabungan = $cfGabungan + $value['cf'] * (1 - $cfGabungan);
                }
            }else{
                if($key == 0){
                    $cfGabungan = $value['cf'];
                }
            }
        }

        $case = ChiCase::create([
            'user_id' => auth()->user()->id,
            'disease_id' => $request->penyakit_target,
            'valid' => 'valid',
            'pakar' => 1,
            'tingkat_kepercayaan' => $cfGabungan*100,
        ]);

        foreach($request->gejala as $gejala) {
            CaseForSymptom::create([
                'chi_case_id' => $case->id,
                'symptom_id' => $gejala['id'],
                'mb' => $request->tp[$item['id']],
                'md' => 100 -  $request->tp[$item['id']],
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
