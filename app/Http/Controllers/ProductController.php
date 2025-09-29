<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::All();
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::create($validateData);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product->update($validateData);

        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 201);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully',
            'product' => $product
        ]);
    }
}
