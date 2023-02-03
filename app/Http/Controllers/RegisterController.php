<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function daftar(Request $request)
    {
        $cek = $request->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                
            ],
            [
                'name.required' => 'Nama tidak boleh kosong',
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                
            ]
        );

        if ($cek == false) {
            return redirect()->back()->withErrors($cek)->withInput();
        } else {
            $dataUser = User::where('username', $request->username)->first();
            if ($dataUser) {
                return redirect()->back()->with('alert', 'Username sudah ada !');
            } else {
                $dataUser = new User();
                $dataUser->name = $request->name;
                $dataUser->username = $request->username;
                $dataUser->password = Hash::make($request->password);
                $dataUser->role = 2;
                $dataUser->save();

                return redirect()->back()->with('alert', 'Berhasil Daftar !');
            }
        }
    }
}
