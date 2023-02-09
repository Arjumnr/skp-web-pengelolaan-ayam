<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelPakan;

class PakanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = ModelPakan::with('user')->get();
            return view('admin.pakan.index', compact('data'));
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
