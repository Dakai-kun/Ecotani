<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CitizenScience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitizenScienceController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'location' => 'required',
            'weight' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = CitizenScience::create([
            'name' => $request->name,
            'location' => $request->location,
            'weight' => $request->weight,
            'userId' => $request->userId
        ]);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan!',
            'success' => 200,
            'data' => $data
        ], 200);
    }
}
