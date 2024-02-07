<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginView() {
        return view('pages.auth.login');
    }

    public function loginAction(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function registerView() {
        return view('pages.auth.register');
    }

    public function forgotPassView() {
        return view('pages.auth.forgotPassword');
    }

    public function profileView() {
        dd(Auth::user());
    }
}
