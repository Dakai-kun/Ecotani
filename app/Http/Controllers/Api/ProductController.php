<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\UserPrefrence;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::latest()->paginate(5);

        return new ProductResource(true, 'List Data Product', $products);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'gram' => 'required',
            'categoryId' => 'required',
            'userId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $data = Product::create([
            'image' => 'products/' . $imageName,
            'name' => $request->name,
            'description' => $request->description,
            'weight' => $request->weight,
            'price' => $request->price,
            'stock' => $request->stock,
            'gram' => $request->gram,
            'categoryId' => $request->categoryId,
            'userId' => $request->userId
        ]);

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Bearer " . env('GROQ_API_KEY'),
        ])->post("https://api.groq.com/openai/v1/chat/completions", [
                    "model" => "llama-3.1-8b-instant",
                    "input" => $data->name,
                ]);

        if ($response->successful()) {
            $embedding = $response->json()['data'][0]['embedding'];

            // 3. Update produk dengan embedding
            $data->embedding = json_encode($embedding);
            $data->save();
        }

        return response()->json([
            'message' => 'Data Berhasil Ditambahkan!',
            'success' => 200,
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return response()->json([
            'message' => 'Detail Data Product!',
            'success' => 200,
            'data' => $product
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'gram' => 'required',
            'categoryId' => 'required',
            'userId' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $product = Product::find($id);

        if ($request->hasFile('image')) {

            //delete old image

            if (File::exists(public_path($product->image))) {

                File::delete(public_path($product->image));

            } else {

                dd('File does not exists.');

            }

            //upload image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);

            //update product with new image
            $product->update([
                'image' => 'products/' . $imageName,
                'name' => $request->name,
                'description' => $request->description,
                'weight' => $request->weight,
                'price' => $request->price,
                'stock' => $request->stock,
                'gram' => $request->gram,
                'categoryId' => $request->categoryId,
                'userId' => $request->userId
            ]);

        } else {

            //update product without image
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'weight' => $request->weight,
                'price' => $request->price,
                'stock' => $request->stock,
                'gram' => $request->gram,
                'categoryId' => $request->categoryId,
                'userId' => $request->userId
            ]);
        }

        return response()->json([
            'message' => 'Data Berhasil Diubah!',
            'success' => 200,
            'data' => $product
        ], 200);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path($product->image));
        $product->delete();

        return response()->json([
            'message' => 'Data Berhasil Dihapus!',
            'success' => 200,
            'data' => $product
        ], 200);
    }
}
