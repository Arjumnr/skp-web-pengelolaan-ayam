<?php

namespace App\Http\Controllers\Ayam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAyam;
use Yajra\DataTables\Facades\DataTables;

class AyamKeluarController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->ajax()) {
            $data = ModelAyam::where('status', 'keluar')->where('user_id', $user_id)->get();
            if($data){
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<button  data-toggle="modal" data-target="#mediumModal" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editAyamKeluar ti-pencil"></button>';
                        $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAyamKeluar ti-trash"></button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

        }
        return view('peternak.ayam.keluar.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        try {
            ModelAyam::updateOrCreate(
                ['id' => $request->ayam_id],
                [
                    'user_id' => $user_id,
                    'nomor' => $request->nomor,
                    'nama_pembeli' => $request->nama_pembeli,
                    'jumlah' => $request->jumlah,
                    'total_berat' => $request->total_berat,
                    'umur' => $request->umur,
                    'status' => 'keluar'
                ]
            );
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        // return response()->json($user_id);
    }

    public function edit($id)
    {
        $dataAyam = ModelAyam::find($id);
        return response()->json($dataAyam);
    }

    public function update(Request $request, $id)
    {
        try{
            $data = ModelAyam::find($id);

            $data->update([
                'nomor' => $request->nomor,
                'nama_pembeli' => $request->nama_pembeli,
                'jumlah' => $request->jumlah,
                'total_berat' => $request->total_berat,
                'umur' => $request->umur,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
        }catch(\Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            ModelAyam::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}