<?php

namespace App\Http\Controllers;

use App\Models\ModelAyam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Facades\DataTables;

class AyamController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = ModelAyam::all();
            //get nama user dari model user
            $model = ModelAyam::with('user');

            if ($request->ajax()) {
                return Datatables::of($data)
                //user_id adalah nama kolom di tabel ayam
                    ->addIndexColumn('id', function ($data) {
                        return $data->user->name;
                    })
                    ->make(true);
            }
            return view('admin.ayam.index');

            // $name = $data->user->name;
            // return response()->json(['tes' => $name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
