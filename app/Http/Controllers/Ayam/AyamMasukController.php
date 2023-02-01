<?php

namespace App\Http\Controllers\Ayam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAyam;
use Yajra\DataTables\Facades\DataTables;

class AyamMasukController extends Controller
{
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = ModelAyam::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {


                    $btn = '<button  data-toggle="modal" data-target="#mediumModal" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editAyamMasuk ti-pencil"></button>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAyamMasuk ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('peternak.ayam.masuk.index');
    }

    public function store(Request $request)
    {
        try {
            ModelAyam::updateOrCreate(
                ['id' => $request->ayam_id],
                ['nomor' => $request->nomor, 'jumlah' => $request->jumlah, 'total_berat' => $request->total_berat, 'umur' => $request->umur, 'status' => 'masuk']
            );
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataAyam = ModelAyam::find($id);
        return response()->json($dataAyam);
    }

    public function update(Request $request, $id)
    {
        $data = ModelAyam::find($id);
        $cekNomor = ModelAyam::where('nomor', $request->nomor)->where('id', '!=', $id)->first();
        if ($cekNomor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nomor sudah ada'
            ]);
        } else {
            $data->update([
                'nomor' => $request->nomor,
                'jumlah' => $request->jumlah,
                'total_berat' => $request->total_berat,
                'umur' => $request->umur,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
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
