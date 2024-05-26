<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // halaman menampilkan dashboard admin
    public function dashboardAdmin(){
        return view('pages.admin.index');
    }

    // halaman menampilkan data user pakar
    public function listUserPakar(){
        $user = User::where('type', 'pakar')->get();

        $data = [
            'user' => $user
        ];

        return view('pages.admin.listUser', $data);
    }

    // halaman menampilkan tambah pakar
    public function addPakarView(){
        return view('pages.admin.addPakar');
    }

    // method untuk menambahkan pakar
    public function addPakarAction(Request $request){
        User::create([
            'username' => $request->nama,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'password' => bcrypt($request->password),
            'type' => 'pakar'
        ]);
        
        
        return redirect()->route('dataUserPakarView')->with('success', 'Pakar berhasil ditambahkan');
    }

    // halaman menampilkan edit pakar
    public function editPakarView($id){
        $user = User::find($id);

        $data = [
            'user' => $user
        ];

        return view('pages.admin.editPakar', $data);
    }

    // method untuk mengedit pakar

    public function editPakarAction(Request $request, $id){
        $user = User::find($id);

        $user->username = $request->name;
        $user->email = $request->email;
        $user->noHp = $request->noHp;

        $user->save();

        return redirect()->route('dataUserPakarView')->with('success', 'Pakar berhasil diubah');

    }
}
