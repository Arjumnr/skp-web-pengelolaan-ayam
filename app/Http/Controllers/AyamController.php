<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelAyam;

class AyamController extends Controller
{
    //Ayam Masuk
    public function indexAyamMasuk()
    {
        //get data dengan status masuk
        $data = ModelAyam::where('status', 'masuk')->orderBy('created_at', 'desc')->get();
        //dump created at

        //return data tabel
        return view('peternak.ayam.masuk.index')->with([
            'active' => 'active',
            'data' => $data,
        ]);
    }

    //show ayam masuk
    public function showAyamMasuk(Request $request)
    {
        dd($request->id);
    }

    //tambah ayam masuk
    public function storeAyamMasuk(Request $request)
    {
        $request->validate(
            [
                'nomor' => 'required',
                'jumlah' => 'required',
                'total_berat' => 'required',
                'umur' => 'required',
            ],
            [
                'nomor.required' => 'Nomor Harus Diisi',
                'jumlah.required' => 'Jumlah Harus Diisi',
                'total_berat.required' => 'Total Berat Harus Diisi',
                'umur.required' => 'Umur Harus Diisi',

            ]
        );

        $model = new ModelAyam();
        $model->nomor = $request->nomor;
        $model->jumlah = $request->jumlah;
        $model->total_berat = $request->total_berat;
        $model->umur = $request->umur;
        $model->status = 'masuk';
        $model->save();
    }

    //update ayam masuk
    public function updateAyamMasuk(Request $request, $id)
    {
        //get data
        $data = ModelAyam::find($id);
        //update data
        $data->update([
            'nomor' => $request->nomor,
            'jumlah' => $request->jumlah,
            'total_berat' => $request->total_berat,
            'umur' => $request->umur,
        ]);
        //redirect
        return redirect()->route('indexAyamMasuk')->with('success', 'Data Berhasil Diupdate');
    }


    public function indexAyamKeluar()
    {

        return view('peternak.ayam.keluar.index')->with([
            'active' => 'active',
        ]);
    }
}
