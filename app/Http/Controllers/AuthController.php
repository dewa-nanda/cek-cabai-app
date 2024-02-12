<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView() {
        if(Auth::check()){
            switch(Auth::user()->type){
                case 'pasien':
                    return redirect()->intended(route('dashboard'));
                    break;
                case 'pakar':
                    return redirect()->intended(route('dashboardPakar'));
                    break;
                case 'admin':
                    return redirect()->intended(route('dashboardAdmin'));
                    break;
            }
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

            $type = User::where('email', $request->email)->first()->type;


            switch($type){
                case 'pasien':
                    return redirect()->intended(route('dashboard'));
                    break;
                case 'pakar':
                    return redirect()->intended(route('dashboardPakar'));
                    break;
                case 'admin':
                    return redirect()->intended(route('dashboardAdmin'));
                    break;
            }
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
