<?php

namespace App\Http\Controllers;

use App\Models\ModelAyam;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AyamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ModelAyam::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editAkun ti-pencil"></a>';
                    $btn = $btn . ' <button href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteAkun ti-trash"></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.akun.index');
    }
}
