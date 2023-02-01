<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelAyam;
use Yajra\DataTables\Facades\DataTables;

class AyamController extends Controller
{
    //Ayam Masuk
    public function index(Request $request)
    {
        //get data dengan status masuk
        // $data = ModelAyam::where('status', 'masuk')->orderBy('created_at', 'desc');
        
        
        // return view('peternak.ayam.masuk.index', compact('data'))->with([
        //     'active' => 'active',
        // ]);
       if($request->ajax()){
            $data = ModelAyam::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editAyamMasuk ti-pencil"></a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id. '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAyamMasuk ti-trash"></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);

       }
         return view('peternak.ayam.masuk.index');
    }

    public function store(Request $request){
        try{
            ModelAyam::updateOrCreate(
                ['id' => $request->ayam_id],
                ['nomor' => $request->nomor, 'jumlah' => $request->jumlah, 'total_berat' => $request->total_berat, 'umur' => $request->umur, 'status' => 'masuk']
            );
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
        }catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    // public function destroy($id)
    // {
    //     try{
    //         ModelAyam::find($id)->delete();
    //         return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
    //     }catch(\Exception $e){
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }


    //tambah ayam masuk
    // public function storeAyamMasuk(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'nomor' => 'required',
    //             'jumlah' => 'required',
    //             'total_berat' => 'required',
    //             'umur' => 'required',
    //         ],
    //         [
    //             'nomor.required' => 'Nomor Harus Diisi',
    //             'jumlah.required' => 'Jumlah Harus Diisi',
    //             'total_berat.required' => 'Total Berat Harus Diisi',
    //             'umur.required' => 'Umur Harus Diisi',

    //         ]
    //     );

    //     $model = new ModelAyam();
    //     $model->nomor = $request->nomor;
    //     $model->jumlah = $request->jumlah;
    //     $model->total_berat = $request->total_berat;
    //     $model->umur = $request->umur;
    //     $model->status = 'masuk';
    //     //return and redirect
    //     $model->save();

    //     // return redirect()->route('indexAyamMasuk')->with([
    //     //     'status' => 'success',
    //     // ]);

    //     // return response()->json([
    //     //     'status' => 'success',
              
    //     // ]);
    // }

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
    public function deleteAyamMasuk($id){

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
