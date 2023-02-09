<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelObat;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = ModelObat::with('user')->get();
            return view('admin.obat.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
