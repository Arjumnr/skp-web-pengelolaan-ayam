<?php

namespace App\Http\Controllers\Pakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPakan;
use Yajra\DataTables\Facades\DataTables;

class PakanTerpakaiController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->ajax()) {
            $data = ModelPakan::where('status', 'terpakai')->where('user_id', $user_id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPakanTerpakai ti-pencil"></a>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePakanTerpakai ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('peternak.pakan.terpakai.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        try {
            ModelPakan::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'user_id' => $user_id,
                    'jumlah' => $request->jumlah,
                    'status' => 'terpakai',
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
        $dataPakan = ModelPakan::find($id);
        return response()->json($dataPakan);
    }

    public function update(Request $request, $id)
    {
        // $user_id = auth()->user()->id;
        $data = ModelPakan::find($id);
        // $cekNomor = ModelPakan::where('nomor', $request->nomor)->where('user_id', $user_id)->first();
        // if ($cekNomor) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Nomor sudah ada'
        //     ]);
        // } else {
        try {
            $data->update([
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
            ModelPakan::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
