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
        $user_id = auth()->user()->id;
        if ($request->ajax()) {
            $data = ModelObat::where('user_id', $user_id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editObat ti-pencil"></a>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteObat ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('peternak.obat.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        try {
            ModelObat::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'user_id' => $user_id,
                    'nama_obat' => $request->nama_obat,
                    'jumlah' => $request->jumlah,
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
        $dataAyam = ModelObat::find($id);
        return response()->json($dataAyam);
    }

    public function update(Request $request, $id)
    {
        // $user_id = auth()->user()->id;
        $data = ModelObat::find($id);
        // $cekNomor = ModelObat::where('nomor', $request->nomor)->where('user_id', $user_id)->first();
        // if ($cekNomor) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Nomor sudah ada'
        //     ]);
        // } else {
        try {
            $data->update([
                'nama_obat' => $request->nama_obat,
                'jumlah' => $request->jumlah,
                
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
            ModelObat::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
