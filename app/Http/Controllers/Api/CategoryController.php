<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return new ProductResource(true, 'List Data Category', $categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = Category::create([
            'name' => $request->name
        ]);

        return new ProductResource(true, 'Data Berhasil Dibuat!', $data);
    }

    public function show($id)
    {
        $categories = Category::find($id);

        return new ProductResource(true, 'Detail Data Product!', $categories);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $categories = Category::find($id);

        $categories->update([
            'name' => $request->name
        ]);

        return new ProductResource(true, 'Data Berhasil Diubah', $categories);
    }

    public function destroy($id)
    {
        $categories = Category::find($id);

        $categories->delete();

        return new ProductResource(true, 'Data Berhasil Dihapus!', $categories);
    }
}
