<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
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

        return new ProductResource(true, 'Data Product Bershasil Ditambahkan', $data);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return new ProductResource(true, 'Detail Data Product!', $product);
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

        return new ProductResource(true, 'Data Product Berhasil Diubah!', $product);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path($product->image));
        $product->delete();

        return new ProductResource(true, 'Data Berhasil Dihapus!', $product);
    }
}
