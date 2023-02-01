<?php

namespace App\Http\Controllers\Pakan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ModelPakan;

class PakanMasukController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = ModelPakan::latest()->get();
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
        return view('peternak.pakan.masuk.index');
    }

}
