<?php

namespace App\Http\Controllers;

use App\Models\ModelUser;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function index()
    {
        
        if ($user = Auth::user()) {
            if ($user->role == 1) {
                return redirect()->intended('/');
            } elseif ($user->role == 2) {
                return redirect()->intended('/register');
            }
        }
        return view('login');
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
                        } elseif ($user->role == 2) {
                            return redirect()->intended('/register');
                        }
                    }
                } else {
                    return redirect()->back()->with('alert', 'Username/Password , Salah !');
                }
            } else {
                return redirect()->back()->with('alert', 'Username/Password , Salah !');
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
