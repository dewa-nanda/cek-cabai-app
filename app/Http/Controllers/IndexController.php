<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function indexView()
    {
        return view('pages.index');
    }

    public function penyakitTanamanCabaiView()
    {
        return view('pages.detail.penyakit');
    }
}
