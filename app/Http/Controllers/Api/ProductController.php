<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::latest()->paginate(5);

        return new ProductResource(true, 'List Data Product', $products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg, jpg, png|max:2048',
            'name' => 'required',
            'description' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'gram' => 'required',
            'categoryId' => 'required',
            'userId' => 'required'
        ]);

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

        return $data;
    }
}
