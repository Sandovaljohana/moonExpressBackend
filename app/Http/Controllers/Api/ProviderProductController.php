<?php

namespace App\Http\Controllers;

use App\Models\ProviderProduct;
use Illuminate\Http\Request;

class ProviderProductController extends Controller
{
    public function index()
    {
        try {
            return ProviderProduct::all();
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(ProviderProduct $providerProduct)
    {
        try {
            return $providerProduct;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $providerProduct = ProviderProduct::create($request->all());
            return response()->json($providerProduct, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, ProviderProduct $providerProduct)
    {
        try {
            $providerProduct->update($request->all());
            return response()->json($providerProduct, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(ProviderProduct $providerProduct)
    {
        try {
            $providerProduct->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}