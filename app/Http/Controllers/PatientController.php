<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function historyScanView(){
        return view('pages.history.scan');
    }
}
