<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelAyam;
use Yajra\DataTables\Facades\DataTables;

class AyamController extends Controller
{
    //Ayam Masuk
    



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

    //delete ayam masuk
    public function deleteAyamMasuk($id)
    {

        $data = ModelAyam::find($id);
        $data->delete();
        return redirect()->route('indexAyamMasuk')->with('success', 'Data Berhasil Dihapus');
    }


    public function indexAyamKeluar()
    {

        return view('peternak.ayam.keluar.index')->with([
            'active' => 'active',
        ]);
    }
}
