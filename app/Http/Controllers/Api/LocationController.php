<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->paginate(5);

        return response()->json([
            'message' => 'List Data!',
            'success' => 200,
            'data' => $locations
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $data = Location::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan!',
            'success' => 200,
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $locations = Location::find($id);

        return response()->json([
            'message' => 'Detail Data Location',
            'success' => 200,
            'data' => $locations
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Location::find($id);

        $data->update([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => 'Data Berhasil Diubah!',
            'success' => 200,
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $data = Location::find($id);

        $data->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus!',
            'success' => 200,
            'data' => $data
        ], 200);
    }
}
