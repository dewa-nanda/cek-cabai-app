<?php

namespace App\Http\Controllers;

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
        return view('pages.list.penyakit');
    }

    public function gejalaTanamanCabaiView()
    {
        return view('pages.list.gejala');
    }
}
