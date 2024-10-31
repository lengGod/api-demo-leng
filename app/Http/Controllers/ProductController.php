<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get All Products
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Get Single Product
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }

    // Create New Product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::create($validated);
        return response()->json($product, 201);
    }

    // Update Product
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0'
        ]);

        $product = Product::find($id);
        if ($product) {
            $product->update($validated);
            return response()->json($product);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
    // search product
    public function search($name)
    {
        $products = Product::where('name', 'LIKE', "%{$name}%")->get();
        return response()->json($products);
    }

    // price product
    public function getProductsBelowPrice(Request $request, $price)
    {
        // Validasi price
        $request->validate([
            'price' => 'required|numeric|min:0'
        ]);

        $products = Product::where('price', '<', $price)->get();
        return response()->json($products);
    }
    
    // Delete Product
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted']);
        }
        return response()->json(['message' => 'Product not found'], 404);
    }
}
