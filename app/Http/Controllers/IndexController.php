<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //
    public function indexView()
    {
        if(Auth::check()){
            switch(Auth::user()->type){
                case 'pasien':
                    return redirect()->intended(route('dashboard'));
                    break;
                case 'pakar':
                    return redirect()->intended(route('dashboardPakar'));
                    break;
                case 'admin':
                    return redirect()->intended(route('dashboardAdmin'));
                    break;
            }
        }

        return view('pages.index');
    }

    public function penyakitTanamanCabaiView()
    {
        $penyakit = Disease::get();

        $data = [
            'penyakit' => $penyakit,
        ];

        return view('pages.list.penyakit', $data);
    }

    public function detailPenyakitTanamanCabaiView($id)
    {
        $penyakit = Disease::find($id);

        $data = [
            'penyakit' => $penyakit,
        ];

        return view('pages.detail.penyakit', $data);
    }

    public function gejalaTanamanCabaiView($id)
    {
        $gejala = Symptom::get();
        
        $data = [
            'gejala' => $gejala,
        ];

        return view('pages.list.gejala', $data);
    }
}
