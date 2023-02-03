<?php

namespace App\Http\Controllers\Obat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelObat;
use Yajra\DataTables\Facades\DataTables;

class ObatMasukController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ModelObat::latest()->get();
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

    // public function store(Request $request)
    // {
    //     try {
    //         ModelObat::updateOrCreate(
    //             ['id' => $request->ayam_id],
    //             ['nomor' => $request->nomor, 'jumlah' => $request->jumlah, 'total_berat' => $request->total_berat, 'umur' => $request->umur, 'status' => 'masuk']
    //         );
    //         return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }

    // public function edit($id)
    // {
    //     $dataAyam = ModelObat::find($id);
    //     return response()->json($dataAyam);
    // }

    // public function update(Request $request, $id)
    // {
    //     $data = ModelObat::find($id);
    //     $cekNomor = ModelObat::where('nomor', $request->nomor)->where('id', '!=', $id)->first();
    //     if ($cekNomor) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Nomor sudah ada'
    //         ]);
    //     } else {
    //         $data->update([
    //             'nomor' => $request->nomor,
    //             'jumlah' => $request->jumlah,
    //             'total_berat' => $request->total_berat,
    //             'umur' => $request->umur,
    //         ]);
    //         return response()->json(['status' => 'success', 'message' => 'Data saved successfully.']);
    //     }
    // }
}
