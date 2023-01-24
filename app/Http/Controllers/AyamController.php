<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyamController extends Controller
{
    //Ayam Masuk
    public function indexAyamMasuk()
    {
        return view('peternak.ayam.masuk.index')->with([
            'active' => 'active',
        ]);
    }

    public function indexAyamKeluar()
    {
        
        return view('peternak.ayam.keluar.index')->with([
            'active' => 'active',
        ]);
    }
}
