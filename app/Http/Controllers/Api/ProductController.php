<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\Product;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json(['status' => 200, 'data' => $products]);
        } catch (Exception $e) {
            return response()->json(['status' => 204, 'message' => $e->getMessage()], 204);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

    $product = new Product;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->save();

    return response()->json($product, 201);
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    return response()->json($product, 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
    ]);

    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->save();

    return response()->json($product, 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    $product->delete();

    return response()->json(null, 204);
}
}
