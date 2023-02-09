<?php

namespace App\Http\Controllers\Ayam;

use App\Http\Controllers\Controller;
use App\Models\ModelAyam;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AyamMatiController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->ajax()) {
            $data = ModelAyam::where('status', 'mati')->where('user_id', $user_id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editAyamMati ti-pencil"></a>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAyamMati ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('peternak.ayam.mati.index');
    }

    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        try {
            ModelAyam::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'user_id' => $user_id,
                    'jumlah' => $request->jumlah,
                    'status' => 'mati',
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
        $data = ModelAyam::find($id);
        try {
            $data->update([
                'jumlah' => $request->jumlah,

            ]);
            return response()->json(['status' => 'success', 'message' => 'Update data successfully.']);
        } catch (\Exception $e) {
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
