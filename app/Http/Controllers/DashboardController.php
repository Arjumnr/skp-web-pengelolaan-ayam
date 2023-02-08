<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelUser;


class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 1){
            $jumlahPeternak = ModelUser::where('role', 2)->count();
            
            return view('admin.dashboard')->with([
                'user' => Auth::user(),
                'active' => 'active',
                'jumlahPeternak' => $jumlahPeternak,
            ]);
        }else if (Auth::user()->role == 2){
            return view('index')->with([
                'user' => Auth::user(),
                'active' => 'active',
            ]);
        }
        // return view('index')->with([
        //     'user' => Auth::user(),
        //     'active' => 'active',
        // ]);
    }
}
