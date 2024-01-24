<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekKesehatanController extends Controller
{
    //
    public function indexView()
    {
        return view('pages.cekKesehatan.index');
    }
}
