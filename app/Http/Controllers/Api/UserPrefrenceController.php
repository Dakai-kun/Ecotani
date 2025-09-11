<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPrefrenceController extends Controller
{
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = UserPreference::create([
            'value' => $request->value
        ]);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan!',
            'success' => 200,
            'data' => $data
        ], 200);
    }

    public function recommend($id)
    {
    //     $userId = User::find($id);
        
        $userPreference = UserPreference::where('user_id', $id)->first();

        if (!$userPreference) {
            return response()->json([
                "message" => "User belum punya preferensi"
            ]);
        }

        $preference = $userPreference->value;

        if ($preference) {
            $product = Product::where('description', 'LIKE', '%' . $preference . '%')->get();
        }else {
            $product = Product::latest()->paginate(3);
        }

        return response()->json([
            "user_id" => $id,
            "preference" => $preference,
            "recommendations" => $product
        ]);
    }
}
