<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginView() {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

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

    public function logoutAction(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registerView() {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }

        return view('pages.auth.register');
    }

    public function forgotPassView() {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        
        return view('pages.auth.forgotPassword');
    }

    public function profileView() {
        dd(Auth::user());
    }
}
