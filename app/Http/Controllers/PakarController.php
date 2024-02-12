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
        return view('pages.pakar.kasus');
    }
}
