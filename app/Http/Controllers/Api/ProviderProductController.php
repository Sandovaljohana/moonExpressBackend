<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProviderProduct;

class ProviderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProviderProduct::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $providerProduct = ProviderProduct::create($request->all());
        return response()->json($providerProduct, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProviderProduct $providerProduct)
    {
        return $providerProduct;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProviderProduct $providerProduct)
    {
        $providerProduct->update($request->all());
        return response()->json($providerProduct, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProviderProduct $providerProduct)
    {
        $providerProduct->delete();
        return response()->json(null, 204);
    }

}
