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
        return view('pages.list.penyakit');
    }

    public function gejalaTanamanCabaiView()
    {
        return view('pages.list.tanaman');
    }
}
