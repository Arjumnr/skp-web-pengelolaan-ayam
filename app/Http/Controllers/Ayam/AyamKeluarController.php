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
            $data = ModelAyam::where('status', 'keluar')->where('user_id', $user_id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editAyamKeluar ti-pencil"></a>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAyamKeluar ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('peternak.ayam.keluar.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        try {
            ModelAyam::updateOrCreate(
                ['id' => $request->data_id],
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
            return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        // return response()->json($request->all());
    }

    public function edit($id)
    {
        $dataAyam = ModelAyam::find($id);
        return response()->json($dataAyam);
    }

    public function update(Request $request, $id)
    {
        // $user_id = auth()->user()->id;
        $data = ModelAyam::find($id);
        // $cekNomor = ModelAyam::where('nomor', $request->nomor)->where('user_id', $user_id)->first();
        // if ($cekNomor) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Nomor sudah ada'
        //     ]);
        // } else {
        try {
            $data->update([
                'nomor' => $request->nomor,
                'jumlah' => $request->jumlah,
                'total_berat' => $request->total_berat,
                'umur' => $request->umur,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Update data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        // }
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
