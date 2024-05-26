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
    // Page Dashboard Pakar
        public function dashboardPakar() {
            $repairedCase = ChiCase::get()->where('repaired', true);
            $notCheckedCase = ChiCase::get()->where('valid', 'notChecked');

            $data = [
                'repairedCase' => $repairedCase,
                'notCheckedCase' => $notCheckedCase,
            ];

            return view('pages.pakar.dashboard', $data);
        }

    // Kasus
        // Page List of Kasus
        public function kasusView() {
            $repairedCase = ChiCase::get()->where('repaired', true);
            $notCheckedCase = ChiCase::get()->where('valid', 'notChecked');

            $data = [
                'repairedCase' => $repairedCase,
                'notCheckedCase' => $notCheckedCase,
            ];

            return view('pages.pakar.kasus.index', $data);
        }

        // Page Detail Kasus
        public function detailKasusView($id) {
            $case = ChiCase::find($id);
            $symptom = $case->getAllRelatedSymptom();

            $data = [
                'case' => $case,
                'listGejala' => $symptom,
            ];

            return view('pages.pakar.kasus.detail', $data);
        }

        // function validasi kasus
        public function validasiKasus(Request $request) { 
            $case = ChiCase::find(request()->segment(count(request()->segments())));
            $langthSymptom = count($case->getAllRelatedSymptom());
            
            if(count($request->tp) != $langthSymptom || $request->tp == null) {
                return redirect()->back()->with('error', 'Harap isi tingkat keyakinan untuk tiap gejala!');
            }

            $cf = [];
            $cfGabungan = 0;
            $index = 0;

            foreach($request->tp as $key => $case) {
                $md = 100 - $case;
                $mb = 100 - $md;

                $cf[$index]['id'] = $key;
                $cf[$index]['cf'] = $mb/100-$md/100;
                $cf[$index]['mb'] = $mb;
                $cf[$index]['md'] = $md;
                $index++;
            }

            foreach($cf as $value) {
                CaseForSymptom::find($value['id'])->update([
                    'mb' => $value['mb'],
                    'md' => $value['md'],
                ]);
            }

            $last_key = array_keys($cf);
            $last_key = end($last_key);

            foreach($cf as $key => $value) {
                if($key != $last_key) {
                    if($key == 0){
                        $cfGabungan = $value['cf'] + $cf[$key + 1]['cf'] * (1.0 - $value['cf']);
                    }else{
                        $cfGabungan = $cfGabungan + $value['cf'] * (1 - $cfGabungan);
                    }
                }else{  
                    if($key == 0){
                        $cfGabungan = $cfGabungan + $value['cf'] * (1 - $cfGabungan);
                    }
                }
            }

            // chicase valid kalo threshold > 70%        
            $case = ChiCase::find(request()->segment(count(request()->segments())));
            $case->updateHasValid($cfGabungan);

            return redirect()->route('resultKasus', $case->id)->with('success', 'Kasus berhasil divalidasi!');
        }

        public function resultKasus($id) {
            $case = ChiCase::find($id);
            $disease = disease::get();
            $symptom = $case->getAllRelatedSymptom();
            
            $update_symptom = [];

            
            foreach ($symptom as $value) {
                if($value->bobot_kepercayaan == null){
                    $update_symptom[] = $value;
                }
            }

            $data = [
                'case' => $case,
                'symptom' => $symptom,
                'disease' => $disease,
                'updateSymptom' => $update_symptom,
            ];
        
            return view('pages.pakar.kasus.result', $data)->with('success', 'Kasus berhasil divalidasi!');
        }

        public function addKasusView() {
            $data = [
                'listGejala' => Symptom::get(),
                'listPenyakit' => Disease::get()
            ];

            return view('pages.pakar.kasus.addCase', $data);
        }

        public function addKasus(Request $request) {
            // cek apakah sudah ada kasus yang sama atau belum
            $penyakit = Disease::find($request->penyakit_target);
            
            foreach($penyakit->GetListOfValidCase(1) as $item)
            {
                if($item->checkSimilarSymptom($request->gejala) == true)
                {
                    return redirect()->route('addKasusView')->with('error', 'Kasus yang sama sudah ada');
                }
            }
    
            $case = ChiCase::create([
                'user_id' => auth()->user()->id,
                'disease_id' => $request->penyakit_target,
                'valid' => 'valid',
                'pakar' => 1,
            ]);
    
            foreach($request->gejala as $gejala) {
                CaseForSymptom::create([
                    'chi_case_id' => $case->id,
                    'symptom_id' => $gejala['id'],
                    'bobot_kepercayaan' => $request->tp[$gejala['id']],
                ]);
            }
    
            return redirect()->route('penyakitView')->with('success', 'Kasus berhasil ditambahkan!');
        }

        // update target penyakit di suatu kasus
        public function kasusUpdateDisease(Request $request) {
            $gejala = [];
            $id = request('id');
            $case = ChiCase::find($id);

            $target = $request->disease_target;

            if($request->tp != null) {
                foreach ($request->tp as $key => $value) {
                    $data = [
                        'id' => $key,
                        'bobot_kepercayaan' => $value
                    ];
                    
                    $gejala[] = $data;
                }

                foreach ($gejala as $item){
                    CaseForSymptom::find($item['id'])->updateTingkatKerusakan($item['bobot_kepercayaan']);
                }
            }


            if($target != null) {
                $case->update([
                    'disease_id' => $target,
                    'repaired' => false,
                ]);
            }else{
                $case->update([
                    'repaired' => false,
                ]);
            }

            return redirect()->route('kasusView')->with('success', 'Kasus berhasil diupdate!');
        }

        // Page Edit Kasus
        public function editKasusView($id) {
            $case = ChiCase::find($id);

            $data = [
                'case' => $case
            ];
            return view('pages.pakar.kasus.editCase', $data);
        }

        public function allKasusView() {
            $allCase = ChiCase::get();
            $validCase = $allCase->where('valid', '==', 'valid');

            // dd($validCase);

            $data = [
                'validCase' => $validCase,
            ];

            return view('pages.pakar.kasus.allKasus', $data);
        }

    
    // Penyakit
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

        // Function menambahkan penyakit
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
                    'bobot_kepercayaan' => $request['tp'][$gejala['id']],
                ]);
            }

            return redirect()->route('penyakitView')->with('success', 'Penyakit berhasil ditambahkan!');
        }

        // Page edit penyakit
        public function editPenyakitView($id) { 

            $data = [
                'penyakit' => Disease::find($id),
                'id' => $id,
            ];

            return view('pages.pakar.penyakit.editPenyakit', $data);
        }

        // Function edit penyakit
        public function editPenyakitAction($id, Request $request) { 
            
            Disease::find($id)->update([
                'name' => $request->nama_penyakit,
                'description' => $request->desc,
                'cara_penanganan' => $request->caraPenanganan,
            ]);

            return redirect()->route('penyakitView')->with('success', 'Penyakit berhasil diupdate!');
        }

    // Gejala
        // Tampilan list of gejala
        public function gejalaView() {
            $data = [
                'listGejala' => Symptom::get()
            ];

            return view('pages.pakar.gejala.index', $data);
        }

        // Tampilan tambah gejala
        public function addGejalaView() {
            return view('pages.pakar.gejala.addGejala');
        }

        // function add gejala
        public function addGejalaAction(Request $request) {
            Symptom::create([
                'name' => $request->nama_gejala,
                'description' => $request->desc,
            ]);

            return redirect()->route('gejalaView')->with('success', 'Gejala berhasil ditambahkan!');
        }

        // Tampilan edit gejala
        public function editGejalaView($id) {
            $gejala = Symptom::find($id);

            $data = [
                'gejala' => $gejala,
                'id' => $id,
            ];

            return view('pages.pakar.gejala.editGejala', $data);
        }

        // function edit gejala
        public function editGejalaAction($id, Request $request) {
            $gejala = Symptom::find($id);

            $gejala->update([
                'name' => $request->nama_gejala,
                'description' => $request->desc,
            ]);

            return redirect()->route('gejalaView')->with('success', 'Gejala berhasil diupdate!');
        }
}
