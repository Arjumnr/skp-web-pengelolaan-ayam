<?php

namespace App\Http\Controllers;

use App\Models\ModelAyam;
use App\Models\ModelObat;
use App\Models\ModelPakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelUser;




class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 1) {
            $jumlahPeternak = ModelUser::where('role', 2)->count();
            $jumlahDataAyam = ModelAyam::count();
            $jumlahDataPakan = ModelPakan::count();
            $jumlahDataObat = ModelObat::count();
            return view('admin.dashboard')->with([
                'user' => Auth::user(),
                'active' => 'active',
                'jumlahPeternak' => $jumlahPeternak,
                'jumlahDataAyam' => $jumlahDataAyam,
                'jumlahDataPakan' => $jumlahDataPakan,
                'jumlahDataObat' => $jumlahDataObat,
            ]);
        } else if (Auth::user()->role == 2) {
            //get jumlah ayam masuk 
            $totAyamMasuk = ModelAyam::where('user_id', Auth::user()->id)->where('status', 'masuk')->get();
            $totAyamMasuk = $totAyamMasuk->sum('jumlah');

            //get jumlah ayam keluar
            $totAyamKeluar = ModelAyam::where('user_id', Auth::user()->id)->where('status', 'keluar')->get();
            $totAyamKeluar = $totAyamKeluar->sum('jumlah');

            //get jumlah ayam mati
            $totAyamMati = ModelAyam::where('user_id', Auth::user()->id)->where('status', 'mati')->get();
            $totAyamMati = $totAyamMati->sum('jumlah');

            $totAyam = $totAyamMasuk - $totAyamKeluar - $totAyamMati;




            //get jumlah pakan masuk
            $totPakanMasuk = ModelPakan::where('user_id', Auth::user()->id)->where('status', 'masuk')->get();
            $totPakanMasuk = $totPakanMasuk->sum('jumlah');

            //get jumlah pakan keluar
            $totPakanKeluar = ModelPakan::where('user_id', Auth::user()->id)->where('status', 'keluar')->get();
            $totPakanKeluar = $totPakanKeluar->sum('jumlah');

            //get jumlah pakan terpakai
            $totPakanTerpakai = ModelPakan::where('user_id', Auth::user()->id)->where('status', 'terpakai')->get();
            $totPakanTerpakai = $totPakanTerpakai->sum('jumlah');

            $totPakan = $totPakanMasuk - $totPakanKeluar - $totPakanTerpakai;


            $totObat = ModelObat::where('user_id', Auth::user()->id)->count();

            return view('index')->with([
                'user' => Auth::user(),
                'active' => 'active',
                'totAyamMasuk' => $totAyamMasuk,
                'totAyamKeluar' => $totAyamKeluar,
                'totAyamMati' => $totAyamMati,
                'totAyam' => $totAyam,
                'totPakanMasuk' => $totPakanMasuk,
                'totPakanKeluar' => $totPakanKeluar,
                'totPakanTerpakai' => $totPakanTerpakai,
                'totPakan' => $totPakan,
                'totObat' => $totObat,
            ]);
            // return response()->json([
            //     'totAyamMasuk' => $totAyamMasuk,
            //     'totAyamKeluar' => $totAyamKeluar,
            //     'totAyamMati' => $totAyamMati,
            //     'totAyam' => $totAyamMasuk - $totAyamKeluar - $totAyamMati,
            // ]);
        }
        // return view('index')->with([
        //     'user' => Auth::user(),
        //     'active' => 'active',
        // ]);
    }
}
