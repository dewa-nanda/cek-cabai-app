<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PakarController extends Controller
{
    //
    public function dashboardPakar() {
        return view('pages.pakar.dashboard');
    }

    public function kasusView() {
        return view('pages.pakar.kasus.index');
    }

    public function detailKasusView($id) {
        return view('pages.pakar.kasus.detail');
    }

    public function allKasusView() {
        return view('pages.pakar.kasus.allKasus');
    }

    public function penyakitView() {
        return view('pages.pakar.penyakit.index');
    }
}
