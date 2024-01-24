<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function loginView() {
        return view('pages.auth.login');
    }

    public function registerView() {
        return view('pages.auth.register');
    }
}
