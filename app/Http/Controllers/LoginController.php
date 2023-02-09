<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;





class LoginController extends Controller
{
    public function index()
    {

        if ($user = Auth::user()) {
            if ($user->role == 1) {
                return redirect()->intended('/');
            } else if ($user->role == 2) {
                return redirect()->intended('/');
            }
        } else {
            return view('login');
        }
    }

    public function authenticate(Request $request)
    {
        $cek = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );


        if ($cek == false) {
            return redirect()->back()->withErrors($cek)->withInput();
        } else {
            $dataUser = User::where('username', $request->username)->first();

            if ($dataUser) {
                if (Hash::check($request->password, $dataUser->password)) {

                    $credensial = $request->only('username', 'password');

                    if (Auth::attempt($credensial)) {
                        $user = Auth::user();
                        $request->session()->regenerate();
                        if ($user->role == 1) {
                            return redirect()->intended('/');
                        } else if ($user->role == 2) {
                            return redirect()->intended('/');
                        }
                    }
                } else {
                    Alert::error('Akun tidak ditemukan !');
                    return back();
                }
            } else {
                Alert::error('Akun tidak ditemukan !');
                return back();
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
