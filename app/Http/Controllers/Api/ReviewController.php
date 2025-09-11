<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $product = Product::find($id);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $data = Review::create([
            'rating' => $request->rating,
            'comment' => $request->comment,
            'productId' => $product->id,
            'userId' => $request->userId
        ]);

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan!',
            'success' => 200,
            'data' => $data
        ]);
    }
}
