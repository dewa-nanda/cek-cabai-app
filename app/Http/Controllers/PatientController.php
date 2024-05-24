<?php

namespace App\Http\Controllers;

use App\Models\ChiCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function historyScanView(){
        $listHistoryCase = ChiCase::where('user_id', Auth::user()->id)->get();
        
        $data = [
            'listHistoryCase' => $listHistoryCase
        ];

        return view('pages.history.scan', $data);
    }
}
